<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class HarusAktif
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
        // dd('masuk');
        if($request->user()->status == "aktif"){
            return $next($request);
        }
        Auth::logout();
        return redirect('login')->with('msg','kentut');
    }
}
