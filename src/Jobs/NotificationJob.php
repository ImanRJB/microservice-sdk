<?php

namespace Milyoona\MicroserviceSdk\Jobs;

use App\Jobs\Job;
use Illuminate\Database\Eloquent\Model;

class NotificationJob extends Job
{
    private $model;
    private $method;
    private $changes;

    public function __construct(Model $model, $changes, $method)
    {
        $this->onQueue('ml_notification');
        $this->model = $model;
        $this->method = $method;
        $this->changes = $changes;
    }

    public function handle()
    {
        try {
            $model = $this->model;
            $changes = $this->changes;
            $model_name = class_basename($model);
            if (file_exists(app_path() . '/Services/' . $model_name . 'NotificationCenter/' . $model_name . 'NotificationCenter.php')) {
                $notification_center = 'App\\Services\\' . $model_name . 'NotificationCenter\\' . $model_name . 'NotificationCenter';
                switch ($this->method) {
                    case 'store':
                        $notification_center::createdNotification($model, $changes);
                        break;
                    case 'update':
                        $notification_center::updatedNotification($model, $changes);
                        break;
                    case 'delete':
                        $notification_center::deletedNotification($model, $model->getChanges());
                        break;
                    case 'restore':
                        $notification_center::restoredNotification($model, $model->getChanges());
                        break;
                    case 'forceDelete':
                        $notification_center::forceDeletedNotification($model, $model->getChanges());
                        break;
                }
            }
        } catch (\Exception $exception) {

        }
    }
}
