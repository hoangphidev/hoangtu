<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Order;

class CheckComplete
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
        if(Order::find($request->id)){
            return $next($request);
        }
        return redirect('/');
    }
}
