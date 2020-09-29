<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleNoticia
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
        if(Auth::user()->admin=="no"){
            if(Auth::user()->roles()->pluck('token')->contains('Noticia')){
                return $next($request);   
            }  
            return redirect('/panel');
        } 
    
        return $next($request);  
    }
}
