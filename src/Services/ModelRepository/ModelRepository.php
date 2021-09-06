<?php

namespace Milyoona\MicroserviceSdk\Services\ModelRepository;

use Illuminate\Support\Facades\Facade;

class ModelRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'modelRepository';
    }
}
