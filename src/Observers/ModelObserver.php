<?php

namespace Milyoona\MicroserviceSdk\Observers;

use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class ModelObserver
{
    public function created(Model $model)
    {
        try {
            Redis::publish('notification', json_encode( ['method' => 'store', 'data' => $model->getAttributes()] ));
        } catch (\Exception $exception) {

        }
    }


    public function updated(Model $model)
    {
        try {
            Redis::publish('notification', json_encode( ['method' => 'update', 'data' => $model->getAttributes()] ));
        } catch (\Exception $exception) {

        }
    }


    public function deleted(Model $model)
    {
        try {
            Redis::publish('notification', json_encode( ['method' => 'delete', 'data' => $model->getAttributes()] ));
        } catch (\Exception $exception) {

        }
    }


    public function restored(Model $model)
    {
        try {
            Redis::publish('notification', json_encode( ['method' => 'restore', 'data' => $model->getAttributes()] ));
        } catch (\Exception $exception) {

        }
    }


    public function forceDeleted(Model $model)
    {
        try {
            Redis::publish('notification', json_encode( ['method' => 'forceDelete', 'data' => $model->getAttributes()] ));
        } catch (\Exception $exception) {

        }
    }
}
