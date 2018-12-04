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
        if (Auth::check()) {
            if($request->user()->status == "aktif"){
                return $next($request);
            } else {
                Auth::logout();
                return redirect('login')->with('success_msg', 'Akun Menunggu verifikasi Admin ');
            }
        } else {
            return view('/');
        }

    }
}
