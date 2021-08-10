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

            $consumer_log = new \Milyoona\MicroserviceSdk\Models\ConsumerLog;
            $consumer_log->queue = config('consumer.queue_name');
            $consumer_log->model = config('consumer.models')[$model->getTable()];
            $consumer_log->method = 'store';
            $consumer_log->data = $model->getAttributes();
            $consumer_log->save();

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function updated(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'update', 'data' => $model->getAttributes()] ));

            $consumer_log = new \Milyoona\MicroserviceSdk\Models\ConsumerLog;
            $consumer_log->queue = config('consumer.queue_name');
            $consumer_log->model = config('consumer.models')[$model->getTable()];
            $consumer_log->method = 'update';
            $consumer_log->data = $model->getAttributes();
            $consumer_log->save();

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function deleted(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'delete', 'data' => $model->getAttributes()] ));

            $consumer_log = new \Milyoona\MicroserviceSdk\Models\ConsumerLog;
            $consumer_log->queue = config('consumer.queue_name');
            $consumer_log->model = config('consumer.models')[$model->getTable()];
            $consumer_log->method = 'delete';
            $consumer_log->data = $model->getAttributes();
            $consumer_log->save();

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function restored(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'restore', 'data' => $model->getAttributes()] ));

            $consumer_log = new \Milyoona\MicroserviceSdk\Models\ConsumerLog;
            $consumer_log->queue = config('consumer.queue_name');
            $consumer_log->model = config('consumer.models')[$model->getTable()];
            $consumer_log->method = 'restore';
            $consumer_log->data = $model->getAttributes();
            $consumer_log->save();

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }


    public function forceDeleted(Model $model)
    {
        try {
            Amqp::publish($model->getTable(), json_encode( ['method' => 'forceDelete', 'data' => $model->getAttributes()] ));

            $consumer_log = new \Milyoona\MicroserviceSdk\Models\ConsumerLog;
            $consumer_log->queue = config('consumer.queue_name');
            $consumer_log->model = config('consumer.models')[$model->getTable()];
            $consumer_log->method = 'forceDelete';
            $consumer_log->data = $model->getAttributes();
            $consumer_log->save();

            DB::commit();
        } catch (\Exception $exception) {
            abort(500);
        }
    }
}
