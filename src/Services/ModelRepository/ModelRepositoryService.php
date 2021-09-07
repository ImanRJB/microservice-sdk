<?php

namespace Milyoona\MicroserviceSdk\Services\ModelRepository;

use Illuminate\Database\Eloquent\Model;

class ModelRepositoryService
{
    public function getRecord($model, $query, $selection = ['*'], $relations = [])
    {
        $selection = $selection == [] ? ['*'] : $selection;
        $model = '\\App\\Models\\' . $model;
        return $model::select($selection)->with($relations)->where($query)->first();
    }

    public function getRecords($model, $query, $selection = ['*'], $relations = [])
    {
        $selection = $selection == [] ? ['*'] : $selection;
        $model = '\\App\\Models\\' . $model;
        return $model::select($selection)->with($relations)->where($query)->get();
    }

    public function storeRecord($model, $data)
    {
        $model = '\\App\\Models\\' . $model;
        return $model::create($data);
    }

    public function storeRelationRecord($relation, $data)
    {
        return $relation->create($data);
    }

    public function updateRecord(Model $object, $data)
    {
        $object->update($data);
        return $object;
    }

    public function forceStoreRecord($model, $data)
    {
        $model = '\\App\\Models\\' . $model;
        $model = new $model;
        foreach($data as $key => $value) {
            $model->$key = $value;
        }
        $model->save();
        return $model;
    }

    public function forceStoreRelationRecord($relation, $data)
    {
        $model = get_class($relation->getRelated());
        $model = new $model;

        $foreign_key = explode('.', array_values((array)$relation)[0]);
        $foreign_key = end($foreign_key);

        $model->$foreign_key = $relation->getParent()->id;

        foreach($data as $key => $value) {
            $model->$key = $value;
        }
        $model->save();
        return $model;
    }

    public function forceUpdateRecord(Model $object, $data)
    {
        foreach($data as $key => $value) {
            $object->$key = $value;
        }
        $object->save();
        return $object;
    }
}
