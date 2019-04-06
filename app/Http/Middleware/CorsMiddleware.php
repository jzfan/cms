<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domains = ['http://192.168.137.2:8080'];
        $origin = $request->server()['HTTP_ORIGIN'] ?? false;
        if ($origin && in_array($origin, $domains)) {
            header('Access-control-Allow-Origin: ' . $origin);
            header('Access-control-Allow-Headers: *');
            header('Access-control-Allow-Methods: *');
        }
        return $next($request);
    }
}
