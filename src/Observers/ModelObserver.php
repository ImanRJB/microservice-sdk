<?php

namespace Milyoona\MicroserviceSdk\Observers;

use Illuminate\Database\Eloquent\Model;
use Milyoona\MicroserviceSdk\Jobs\NotificationJob;

class ModelObserver
{
    public function created(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, 'store'));
        } catch (\Exception $exception) {

        }
    }


    public function updated(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, 'update'));
        } catch (\Exception $exception) {

        }
    }


    public function deleted(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, 'delete'));
        } catch (\Exception $exception) {

        }
    }


    public function restored(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, 'restore'));
        } catch (\Exception $exception) {

        }
    }


    public function forceDeleted(Model $model)
    {
        try {
            dispatch(new NotificationJob($model, 'forceDelete'));
        } catch (\Exception $exception) {

        }
    }
}
