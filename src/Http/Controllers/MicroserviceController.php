<?php

namespace Milyoona\MicroserviceSdk\Http\Controllers;

use Illuminate\Http\Response;
use Milyoona\MicroserviceSdk\Models\ConsumerLog;

class MicroserviceController
{
    public function index()
    {
        $consumer_logs = ConsumerLog::get()->count();
        $all_models = [];
        foreach (getAppModels() as $model) {
            $model = '\\App\\Models\\' . $model;
            $all_models[strtolower(str_replace('\\App\Models\\', '', $model))] = $model::withTrashed()->get()->count();
            $deleted_models[strtolower(str_replace('\\App\Models\\', '', $model))] = $model::onlyTrashed()->get()->count();
            $updated_models[strtolower(str_replace('\\App\Models\\', '', $model))] = $model::latest()->first() ? $model::latest()->first()->updated_at->format('Y-m-d H:i:s') : null;
        }

        return response(['consumer_logs' => $consumer_logs, 'all_models' => $all_models, 'deleted_models' => $deleted_models, 'updated_models' => $updated_models], Response::HTTP_OK);
    }
}
