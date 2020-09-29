<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoleDirectorio
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
            if(Auth::user()->roles()->pluck('token')->contains('Directorio')){
                return $next($request);   
            }  
            return redirect('/panel');
        }
    
        return $next($request);  
     
    }
}
