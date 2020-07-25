<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class DeleveryMiddleware
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
        $pos = Auth::user()->position_id;
        if ($pos == 1 || $pos == 2 || $pos == 4) {
            return $next($request);
        }else {
            return redirect(route('404'));
        }
    }
}
