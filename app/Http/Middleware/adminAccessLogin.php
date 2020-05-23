<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class adminAccessLogin
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
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->quyen == 1)
            {
                return $next($request);
            }
            else{
                return redirect('/login')->with('thongbao','Bạn không phải admin');
            }
        }else
        {
            return redirect('/login')->with('thongbao','Hãy đăng nhập để vào trang quản trị');
        }
        
    }
}
