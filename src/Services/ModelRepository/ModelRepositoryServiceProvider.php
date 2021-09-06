<?php

namespace Milyoona\MicroserviceSdk\Services\ModelRepository;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ModelRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('modelRepository', function () {
            return App::make('Milyoona\MicroserviceSdk\Services\ModelRepository\ModelRepositoryService');
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
