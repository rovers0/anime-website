<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Checkown
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
            
            if (Auth::user()->id  == $request->route('id')) {
                return $next($request);
            } else {
                return response(view('404'));
            }
            
        }
        else{
            return redirect()->route('login');
        }
    }
}
