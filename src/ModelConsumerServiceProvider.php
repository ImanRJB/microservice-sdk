<?php

namespace Milyoona\ModelConsumer;

use Illuminate\Support\ServiceProvider;
//Register depends
use Anik\Form\FormRequestServiceProvider;
use Bschmitt\Amqp\LumenServiceProvider;
use Flipbox\LumenGenerator\LumenGeneratorServiceProvider;
use Illuminate\Redis\RedisServiceProvider;
use Milyoona\ModelConsumer\Observers\ModelObserver;

class ModelConsumerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (getAppModels() as $model) {
            $model = '\\App\\Models\\' . $model;
            $model::observe(ModelObserver::class);
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
        $this->app->register(RedisServiceProvider::class);
        $this->app->register(LumenGeneratorServiceProvider::class);
        $this->app->register(FormRequestServiceProvider::class);

        // Register Commands
        if ($this->app->runningInConsole()) {
            $commands = array_diff(scandir(__DIR__.'/Console/Commands'), array('.', '..'));
            $basenames = [];
            foreach($commands as $index => $command) {
                $basenames[$index] = '\Milyoona\ModelConsumer\Console\Commands' . '\\' . basename($command, '.php');
            }
            $basenames = array_merge($basenames, ['\Laravelista\LumenVendorPublish\VendorPublishCommand']);
            $this->commands($basenames);
        }

        // Configures
        $this->publishes([
            __DIR__.'/config/consumer.php' => lumen_config_path('consumer.php'),
            __DIR__.'/config/amqp.php' => lumen_config_path('amqp.php'),
            __DIR__.'/config/database.php' => lumen_config_path('database.php'),
        ], 'consumer');

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

        // Base migrations
        if (!empty(getMigrations())) {
            foreach( array_diff(scandir(__DIR__.'/database/migrations/base'), array('.', '..')) as $migration) {
                $this->publishes([
                    __DIR__.'/database/migrations/base/' . $migration => lumen_database_path(date('Y_m_d_') . str_pad(array_search(basename($migration, '.php'), getMigrations()) + 1, 6, '0', STR_PAD_LEFT) . '_create_' . basename($migration, '.php') .  '_table.php')
                ], 'consumer_' . basename($migration, '.php') );
            }
        }
    }
}
