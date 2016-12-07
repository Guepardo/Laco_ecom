<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){

        if(!session('admin')){
            return redirect()->
            route('login.page')->
            with('status', 'Você foi bloqueado. Faça o login, por favor'); 
        }
        
        return $next($request);
    }
}
