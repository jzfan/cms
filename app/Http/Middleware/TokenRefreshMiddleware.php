<?php

namespace App\Http\Middleware;

use Cache;
use Closure;
use Illuminate\Auth\AuthenticationException;

class TokenRefreshMiddleware
{
    private $time;

    public function handle($request, Closure $next)
    {
        $oldToken = $this->getTokenFrom($request);
        $this->time = substr($oldToken, -10);

        if ($this->isNotExpired()) {
            return $next($request);
        }

        if ($newToken = $this->getCache($oldToken)) {

            $response = $next($request);
            return $response->header('Authorization', "Bearer {$newToken}");
        }

        if ($this->canRefresh()) {

            $newToken = $request->user()->freshToken();
            $this->setCache($oldToken, $newToken);

            $response = $next($request);
            return $response->header('Authorization', "Bearer {$newToken}");
        }

        
        throw new AuthenticationException;
        
    }

    private function getTokenFrom($request)
    {
        $str = $request->headers->get('Authorization');
        return substr($str, 7);
    }

    private function isNotExpired()
    {
        return time() - $this->time < config('token.expires') * 3600;
    }

    private function canRefresh()
    {
        return time() - $this->time < config('token.refresh') * 24 * 3600;
    }

    private function getCache($key)
    {
        return Cache::get($key);
    }

    private function setCache($key, $value)
    {
        return Cache::set($key, $value, config('token.cache_seconds'));
    }
}
