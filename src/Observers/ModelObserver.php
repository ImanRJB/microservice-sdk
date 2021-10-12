<?php

namespace Milyoona\MicroserviceSdk\Observers;

use Illuminate\Database\Eloquent\Model;
use Milyoona\MicroserviceSdk\Jobs\NotificationJob;

class ModelObserver
{
    public function created(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, $model->getChanges(), 'store'));
        } catch (\Exception $exception) {

        }
    }


    public function updated(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, $model->getChanges(), 'update'));
        } catch (\Exception $exception) {

        }
    }


    public function deleted(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, $model->getChanges(), 'delete'));
        } catch (\Exception $exception) {

        }
    }


    public function restored(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, $model->getChanges(), 'restore'));
        } catch (\Exception $exception) {

        }
    }


    public function forceDeleted(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, $model->getChanges(), 'forceDelete'));
        } catch (\Exception $exception) {

        }
    }
}
