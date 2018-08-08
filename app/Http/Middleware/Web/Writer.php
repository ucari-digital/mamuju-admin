<?php

namespace App\Http\Middleware\Web;

use Closure;
use Illuminate\Support\Facades\Auth;

class Writer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }elseif(Auth::User()->role == "writer"){
            return $next($request);
        }else{
            return redirect()->guest('login');
        }
    }
}
