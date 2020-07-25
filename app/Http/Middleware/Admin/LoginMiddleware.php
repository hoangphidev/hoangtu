<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->status == 1) {
                return $next($request);
            }else {
                return redirect(route('admin.logout'))->with('notice', 'Không thể đăng nhập. Liên hệ Admin để được cấp quyền đăng nhập.');
            }
        }else {
            return redirect(route('admin.login'))->with('notice', 'Vui lòng đăng nhập trước.');
        }
    }
}
