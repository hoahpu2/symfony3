<?php
 
namespace App\Http\Middleware;
 
use Closure;
use Illuminate\Support\Facades\Auth;
use Session;
 
class AdminLoginMiddleware
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
        if (Auth::check()) {
            $hoa = Auth::user();
            Session::put('hoalogin',$hoa->fullname);
            Session::put('hoa_login',$hoa['id']);
            Session::put('hoa_avatar',$hoa['avatar']);
            return $next($request);
        } else {
            //return $next($request);
            return redirect('admin');
        }
        
    }
}
