<?php

namespace Milyoona\MicroserviceSdk\Middleware;

use Closure;

class MeasureExecutionTime
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $response->headers->set('X-Elapsed-Time', number_format((microtime(true) - LUMEN_START) * 1000, 2, '.', ''));

        return $response;
    }
}
