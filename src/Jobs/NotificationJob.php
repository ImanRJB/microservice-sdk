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
        //
    }

}
