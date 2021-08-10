<?php

namespace Milyoona\MicroserviceSdk;

use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Support\ServiceProvider;
//Register depends
use Anik\Form\FormRequestServiceProvider;
use Bschmitt\Amqp\LumenServiceProvider;
use Flipbox\LumenGenerator\LumenGeneratorServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;
use Milyoona\MicroserviceSdk\Observers\ModelObserver;

class MicroserviceSdkServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {
            $token = $request->bearerToken();
            if ($token) {
                try {
                    $decoded = JWT::decode($token, config('jwt.jwt_secret'), array('HS256'));
                    if ($decoded->expires_in < Carbon::now()) {
                        return;
                    }
                    $model = '\\App\\Models\\User';
                    $user = $model::find($decoded->user->id);
                    if ($user) {
                        return $user;
                    } else {
                        return;
                    }
                } catch (\Exception $exception) {
                    return;
                }
            }
        });


        $except = ['Admin', 'Role'];
        foreach (getAppModels() as $model) {
            if (array_search($model, $except) === false) {
                $model = '\\App\\Models\\' . $model;
                $model::observe(ModelObserver::class);
            }
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Register depends packages service providers
        $this->app->register(LumenServiceProvider::class);
        $this->app->register(LumenGeneratorServiceProvider::class);
        $this->app->register(FormRequestServiceProvider::class);

        // Register Commands
        if ($this->app->runningInConsole()) {
            $commands = array_diff(scandir(__DIR__.'/Console/Commands'), array('.', '..'));
            $basenames = [];
            foreach($commands as $index => $command) {
                $basenames[$index] = '\Milyoona\MicroserviceSdk\Console\Commands' . '\\' . basename($command, '.php');
            }
            $basenames = array_merge($basenames, ['\Laravelista\LumenVendorPublish\VendorPublishCommand']);
            $this->commands($basenames);
        }

        // Configures
        $this->publishes([
            __DIR__.'/config/consumer.php' => lumen_config_path('consumer.php'),
            __DIR__.'/config/amqp.php' => lumen_config_path('amqp.php'),
            __DIR__.'/config/database.php' => lumen_config_path('database.php'),
            __DIR__.'/config/jwt.php' => lumen_config_path('jwt.php'),
        ], 'microservice-sdk');

        // For migrate new migrations
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/news');

        // For load config files
        if (file_exists($this->app->basePath() . '/config/amqp.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/amqp.php', 'amqp');
        }
        if (file_exists($this->app->basePath() . '/config/consumer.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/consumer.php', 'consumer');
        }
        if (file_exists($this->app->basePath() . '/config/database.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/database.php', 'database');
        }
        if (file_exists($this->app->basePath() . '/config/jwt.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/jwt.php', 'jwt');
        }

        // Base migrations
        if (!empty(getMigrations())) {
            foreach( array_diff(scandir(__DIR__.'/database/migrations/base'), array('.', '..')) as $migration) {
                $this->publishes([
                    __DIR__.'/database/migrations/base/' . $migration => lumen_database_path(date('Y_m_d_') . str_pad(array_search(basename($migration, '.php'), getMigrations()) + 1, 6, '0', STR_PAD_LEFT) . '_create_' . basename($migration, '.php') .  '_table.php')
                ], 'consumer_' . basename($migration, '.php') );
            }
        }

        // Register Repositories
        foreach (getRepositories() as $repository) {
            $this->app->bind(
                'App\\Repositories\\Interfaces\\' . $repository . 'Interface',
                'App\\Repositories\\' . $repository
            );
        }

        // Register Middlewares
        if ($this->app instanceof \Illuminate\Foundation\Application) {
            $router = $this->app['router'];
            $router->pushMiddlewareToGroup('api', \Milyoona\MicroserviceSdk\Middleware\PersianNumber::class);
            $router->pushMiddlewareToGroup('web', \Milyoona\MicroserviceSdk\Middleware\PersianNumber::class);
        } else {
            $this->app->middleware(\Milyoona\MicroserviceSdk\Middleware\PersianNumber::class);
        }


        // Change app lang to Fa
        $this->app->singleton('translator', function () {
            $this->app->instance('path.lang', __DIR__ . '/lang');
            $this->app->register(TranslationServiceProvider::class);
            return $this->app->make('translator');
        });
        $this->app->setLocale('fa');


        // Register Routes
        $this->app->router->group([
            'namespace' => 'Milyoona\MicroserviceSdk\Http\Controllers',
            'prefix' => 'microservice/' . config('consumer.queue_name')
        ], function ($router) {
            require __DIR__.'/routes/api.php';
        });
    }
}
