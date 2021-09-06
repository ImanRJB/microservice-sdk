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
use Fruitcake\Cors\CorsServiceProvider;
use Illuminate\Redis\RedisServiceProvider;
use Milyoona\MicroserviceSdk\Services\ModelRepository\ModelRepositoryServiceProvider;

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


//        $except = ['Admin', 'Role'];
//        foreach (getAppModels() as $model) {
//            if (array_search($model, $except) === false) {
//                $model = '\\App\\Models\\' . $model;
//                $model::observe(ModelObserver::class);
//            }
//        }
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
        $this->app->register(CorsServiceProvider::class);
        $this->app->register(RedisServiceProvider::class);

        //Services
        $this->app->alias('ModelRepository', 'Milyoona\MicroserviceSdk\Services\ModelRepository\ModelRepository');
        $this->app->register(ModelRepositoryServiceProvider::class);

        // Configures
        $this->publishes([
            __DIR__.'/config/database.php' => lumen_config_path('database.php'),
            __DIR__.'/config/jwt.php' => lumen_config_path('jwt.php'),
            __DIR__.'/config/cors.php' => lumen_config_path('cors.php'),
        ], 'microservice-sdk');


        // For load config files
        if (file_exists($this->app->basePath() . '/config/database.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/database.php', 'database');
        }
        if (file_exists($this->app->basePath() . '/config/jwt.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/jwt.php', 'jwt');
        }
        if (file_exists($this->app->basePath() . '/config/cors.php')) {
            $this->mergeConfigFrom($this->app->basePath() . '/config/cors.php', 'cors');
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
            $this->app->middleware(\Milyoona\MicroserviceSdk\Middleware\MeasureExecutionTime::class);
            $this->app->middleware(\Fruitcake\Cors\HandleCors::class);
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
