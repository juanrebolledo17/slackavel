<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class HandleOnlineStatus
{
    /**
     * Handle an incoming request to check the status of the user, online or offline.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $request->session()->put('online_status', 'online');
        } else {
            $request->session()->put('online_status', 'offline');
        }

        return $next($request);
    }
}
