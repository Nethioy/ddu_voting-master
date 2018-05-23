<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->check() && $request->user()->role==0){
            return redirect()->guest('home');
        } 
        if(auth()->check() && $request->user()->role==1){
            return redirect()->guest('home');
        } 
        if(auth()->check() && $request->user()->role==2){
            return redirect()->guest('home');
        } 

        return $next($request);
    }
}
