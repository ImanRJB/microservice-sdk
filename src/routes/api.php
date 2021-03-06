<?php

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

$router->get('status', ['uses' => 'MicroserviceController@index']);
$router->get('service/status', ['uses' => 'MicroserviceController@status']);

