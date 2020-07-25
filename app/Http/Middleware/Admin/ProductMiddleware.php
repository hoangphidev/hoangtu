<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProductMiddleware
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
        if (Auth::user()->position_id == 1 || Auth::user()->position_id == 2) {
            return $next($request);
        }else {
            // return back();
            return redirect(route('404'));
        }
    }
}
