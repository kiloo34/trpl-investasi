<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminDoang
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
        // dd($request->user()->role == "admin");
        if($request->user()->role == "admin"){
            return $next($request);
        }
        return redirect('/');
    }
}
