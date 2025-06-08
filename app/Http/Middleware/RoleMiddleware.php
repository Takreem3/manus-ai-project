<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!$request->user() || !$request->user()->hasRole($role)) {
            return redirect()->route('login')->with('error', 'You do not have permission to access this area.');
        }
        
        return $next($request);
    }
}
