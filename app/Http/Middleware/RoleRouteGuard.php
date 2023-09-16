<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleRouteGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (auth()->user()->role !== $role){
            return to_route('dashboard');
        }
        return $next($request);
    }
}
