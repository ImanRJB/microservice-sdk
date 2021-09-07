<?php

namespace Milyoona\MicroserviceSdk\Services\ModelRepository;

use Illuminate\Support\Facades\Facade;

/**
 * @method static getRecord($model, $query, $selection = [], $relations = [])
 * @method static getRecords($model, $query, $selection = [], $relations = [])
 * @method static storeRecord($model, $data)
 * @method static storeRelationRecord($relation, $data)
 * @method static updateRecord(\Illuminate\Database\Eloquent\Model $object, $data)
 */

class ModelRepository extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'modelRepository';
    }
}
