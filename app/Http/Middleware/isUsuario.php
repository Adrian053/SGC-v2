<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class isUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /*public function handle($request, Closure $next)
    {
        return $next($request);
    }*/

    public function handle($request, Closure $next){
        $user = Auth::user();
        if($user->rol == 1 || $user->rol == 2){
            return $next($request);
        } else{
            // abort(403, 'Wrong Accept Header');
            return new Response(view('Noautorizado')->with('rol', 2));

        }
    }
}
