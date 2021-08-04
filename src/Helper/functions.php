<?php


if ( ! function_exists('checkRelation') )
{
    function checkRelation($table)
    {
        if(!empty(getMigrations())) {
            return in_array($table, getMigrations());
        }
        return false;
    }
}

if ( ! function_exists('getMigrations'))
{
    function getMigrations()
    {
        $migrations = config('consumer.publish_migration');
        if (!empty($migrations)) {
            $migrations = array_map(function ($value) { return rtrim($value, ':'); }, $migrations);
        }
        return $migrations;
    }
}

if ( ! function_exists('consumerCrud') )
{
    function consumerCrud($routingKey, $method, $data)
    {
        try {
            $model = '\\Milyoona\\MicroserviceSdk\\Models\\' . config('consumer.models')[$routingKey];

            switch($method) {
                case 'store':
                    $model::create($data);
                    break;
                case 'update':
                    $model::withTrashed()->find($data['id'])->update($data);
                    break;
                case 'delete':
                    $model::withTrashed()->find($data['id'])->delete();
                    break;
                case 'forceDelete':
                    $model::withTrashed()->find($data['id'])->forceDelete();
                    break;
                case 'restore':
                    $model::withTrashed()->find($data['id'])->restore();
                    break;
            }
        } catch (Exception $exception) {
            \Milyoona\MicroserviceSdk\Models\ConsumerLog::create([
                'queue' => config('consumer.queue_name'),
                'routing_key' => $routingKey,
                'data' => $data,
                'exception' => $exception
            ]);
        }
    }
}

if ( ! function_exists('lumen_config_path') )
{
    function lumen_config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('lumen_database_path') )
{
    function lumen_database_path($path = '')
    {
        return app()->basePath() . '/database/migrations' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('isBase') )
{
    function isBase($table)
    {
        $migrations = config('consumer.publish_migration');
        if (!empty($migrations)) {
            return in_array($table . ':', $migrations);
        }
        return false;
    }
}

if (!function_exists('app_path')) {
    /**
     * Get the path to the application folder.
     *
     * @param  string $path
     * @return string
     */
    function app_path($path = '')
    {
        return app('path') . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('getAppModels')) {
    function getAppModels()
    {
        $path = app_path() . "/Models";
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename =  $result;
            if (is_dir($filename)) {
                $out = array_merge($out, getModels($filename));
            }else{
                $out[] = substr($filename,0,-4);
            }
        }
        return $out;
    }
}

if (!function_exists('getRepositories')) {
    function getRepositories()
    {
        $path = app_path() . "/Repositories";
        if (file_exists($path)) {
            $out = [];
            $results = scandir($path);
            foreach ($results as $result) {
                if ($result === '.' or $result === '..') continue;
                $filename =  $result;
                if (!is_dir($path . '/' . $filename)) {
                    $out[] = substr($filename,0,-4);
                }
            }
            return $out;
        }
        return [];
    }
}