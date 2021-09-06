<?php

namespace Milyoona\MicroserviceSdk\Services\ModelRepository;

class ModelRepositoryService
{
    public function __construct()
    {

    }

    public function getRecord($model, $query, $relations = [])
    {
        $model = '\\App\\Models\\' . $model;
        return $model::with($relations)->where($query)->first();
    }

    public function getRecords($model, $query, $relations = [])
    {
        $model = '\\App\\Models\\' . $model;
        return $model::with($relations)->where($query)->get();
    }

    public function storeRecord($model, $data)
    {
        $model = '\\App\\Models\\' . $model;
        return $model::create($data);
    }

    public function updateRecord($model, $query, $data)
    {
        $model = '\\App\\Models\\' . $model;
        $record = $model::where($query)->first();
        $record->update($data);
        return $record;
    }
}
