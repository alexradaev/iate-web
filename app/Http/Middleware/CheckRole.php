<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roleName
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $roleName)
    {
        if ($request->user() === null || !$request->user()->hasRole($roleName)) {
			return redirect('');
        }
        return $next($request);
    }
}
