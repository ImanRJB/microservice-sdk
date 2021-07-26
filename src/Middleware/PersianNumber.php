<?php

namespace Milyoona\MicroserviceSdk\Middleware;

use Closure;

class PersianNumber
{
    public function handle($request, Closure $next)
    {
        foreach ($request->all() as $key => $item) {
            $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
            $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
            $num = range(0, 9);
            $convertedPersianNums = str_replace($persian, $num, $request[$key]);
            $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNums);
            $request[$key] = $englishNumbersOnly;
        }
        return $next($request);
    }
}
