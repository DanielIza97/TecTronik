<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class Perfil
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
            $rol=false;
            $user=Auth::user();
            if(($user->rol=='cliente'))
                return $next($request);
        }
        return redirect('/login');
    }
}
