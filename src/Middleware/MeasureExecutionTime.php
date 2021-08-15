<?php

namespace Milyoona\MicroserviceSdk\Middleware;

use Closure;

class MeasureExecutionTime
{
    public function handle($request, Closure $next)
    {
        $star_time = microtime(true);
        $response = $next($request);
        $response->headers->set('X-Elapsed-Time', number_format((microtime(true) - $star_time) * 1000, 2, '.', ''));
        return $response;
    }
}
