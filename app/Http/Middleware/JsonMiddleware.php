<?php

namespace App\Http\Middleware;

use Closure;

class JsonMiddleware
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
        if (request()->wantsJson()) {
            return $next($request);
        }
        return response()->json(['error' => 'Esta ruta no se encuentra disponible', 'code' => 401], 401);
    }
}
