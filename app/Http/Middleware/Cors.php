<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class Cors
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*');

    }
}
