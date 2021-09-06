<?php

namespace Milyoona\MicroserviceSdk\Services\ModelRepository;

use Illuminate\Support\Facades\Facade;

/**
 * @method static getRecord($model, $query, $relations = [])
 * @method static getRecords($model, $query, $relations = [])
 * @method static storeRecord($model, $data)
 * @method static updateRecord($model, $query, $data)
 */

class ModelRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'modelRepository';
    }
}
