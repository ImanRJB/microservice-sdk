<?php

namespace Milyoona\MicroserviceSdk\Http\Controllers;

use Illuminate\Http\Response;
use Milyoona\MicroserviceSdk\Models\ConsumerLog;

class MicroserviceController
{
    public function index()
    {
        $consumer_logs = ConsumerLog::whereStatus(1)->get()->count();
        $consumer_error_logs = ConsumerLog::whereStatus(0)->get()->count();
        $all_models = [];
        foreach (getAppModels() as $model) {
            $model = '\\App\\Models\\' . $model;
            $model_name = str_replace('\\App\Models\\', '', $model);
            $all_models[strtolower($model_name)] = $model::withTrashed()->get()->count();
            $deleted_models[strtolower($model_name)] = $model::onlyTrashed()->get()->count();
            $updated_models[strtolower($model_name)] = ConsumerLog::whereModel($model_name)->whereStatus(1)->whereMethod('update')->get()->count();
        }

        return response(['consumer_logs' => $consumer_logs, 'consumer_error_logs' => $consumer_error_logs, 'all_models' => $all_models, 'deleted_models' => $deleted_models, 'updated_models' => $updated_models], Response::HTTP_OK);
    }
}
