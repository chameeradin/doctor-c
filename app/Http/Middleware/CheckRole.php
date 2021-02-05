<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @param $roles
     * @return mixed
     */
    public function handle($request, Closure $next, $roles)
    {
        if (! in_array(Auth::user()->role->name, explode('|', $roles))) {
            abort(404);
        }

        return $next($request);
    }
}
