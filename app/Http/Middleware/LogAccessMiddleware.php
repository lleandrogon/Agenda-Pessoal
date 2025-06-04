<?php

namespace App\Http\Middleware;

use App\Models\LogAccess;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $route = $request->getRequestUri();
        $user_agent = $request->userAgent();
        $method = $request->method();
        $referer = $request->header('referer');

        LogAccess::create([
            'ip' => $ip,
            'route' => $route,
            'user_agent' => $user_agent,
            'method' => $method,
            'referer' => $referer
        ]);

        return $next($request);
    }
}
