<?php

namespace Milyoona\MicroserviceSdk\Observers;

use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Database\Eloquent\Model;

class ModelObserver
{
    public function created(Model $model)
    {
        Amqp::publish($model->getTable(), json_encode( ['method' => 'store', 'data' => $model] ));
    }


    public function updated(Model $model)
    {
        Amqp::publish($model->getTable(), json_encode( ['method' => 'update', 'data' => $model] ));
    }


    public function deleted(Model $model)
    {
        Amqp::publish($model->getTable(), json_encode( ['method' => 'delete', 'data' => $model] ));
    }


    public function restored(Model $model)
    {
        Amqp::publish($model->getTable(), json_encode( ['method' => 'restore', 'data' => $model] ));
    }


    public function forceDeleted(Model $model)
    {
        Amqp::publish($model->getTable(), json_encode( ['method' => 'forceDelete', 'data' => $model] ));
    }
}
