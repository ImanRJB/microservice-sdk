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
            $model = '\\Milyoona\\ModelConsumer\\Models\\' . config('consumer.models')[$routingKey];

            switch($method) {
                case 'store':
                    $model::create($data);
                    break;
                case 'update':
                    $model::where('id', $data['id'])->updade($data);
                    break;
                case 'delete':
                    $model::where('id', $data['id'])->delete();
                    break;
                case 'forceDelete':
                    $model::where('id', $data['id'])->forceDelete();
                    break;
            }
        } catch (Exception $exception) {
            \Milyoona\ModelConsumer\Models\ConsumerLog::create([
                'queue' => config('consumer.queue_name'),
                'routing_key' => $routingKey,
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
