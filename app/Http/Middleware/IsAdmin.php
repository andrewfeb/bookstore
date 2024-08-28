<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, bool $isadmin): Response
    {
        abort_unless(Auth::user()->isadmin == $isadmin, 401);
        // if (Auth::user()->isadmin !== $isadmin) {
        //     abort(401);
        // }

        //abort_if(Auth::user()->isadmin !== $isadmin, 401);

        return $next($request);
    }
}
