<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class Aminis
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
        if(!Auth::user()==null)
        {
            $user=Auth::user();
            if(!($user->rol=='administrador'))
                return redirect('/');
            return $next($request);
        }
        return redirect('/');
    }
}
