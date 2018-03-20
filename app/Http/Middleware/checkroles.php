<?php

namespace App\Http\Middleware;
use App\User;
use Auth;

use Closure;

class checkroles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        /*
        *   Verifica se está logado
        */
        if (!auth()->check()){
            return redirect()->route('login');
        }
        /*
        *   Verifica se está SuperAdmin
        */
        else if(Auth::user()->roles != 0){
            return redirect()->route('home');
        }
        /*
        *   Aprovado
        */
        else{
            return $next($request);
        }
    }
}
