<?php

namespace Milyoona\MicroserviceSdk\Observers;

use Bschmitt\Amqp\Facades\Amqp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModelObserver
{
    public function creating() {
        DB::beginTransaction();
    }


    public function updating() {
        DB::beginTransaction();
    }


    public function deleting() {
        DB::beginTransaction();
    }


    public function restoring() {
        DB::beginTransaction();
    }


    public function forceDeleting() {
        DB::beginTransaction();
    }


    public function created(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'store', 'data' => $model->getAttributes()] ));
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function updated(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'update', 'data' => $model->getAttributes()] ));
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function deleted(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'delete', 'data' => $model->getAttributes()] ));
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function restored(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'restore', 'data' => $model->getAttributes()] ));
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function forceDeleted(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'forceDelete', 'data' => $model->getAttributes()] ));
            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }
}
