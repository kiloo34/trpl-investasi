<?php

namespace App\Http\Controllers;

use Auth;
use App\Notifikasi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::check()) {
            if (Auth::user()->role=='admin') {
                return view('admin.index');
            } else {
                return view('beranda.index');
            }
        } else {
            return view('beranda.index');
        }
    }

    public function get_notif()
    {
        $user = Auth::user();
        $notifikasi = Notifikasi::where('id_user', $user->id)->orderBy('id', 'desc')->get();
        $mNotifikasi = new Notifikasi;
        // dd($notifikasi);

        // if (condition) {
        //     # code...
        // } elseif () {
        //     # code...
        // }


        return view('notifikasi', [
            'user'          => $user,
            'notifikasi'    => $notifikasi,
            'model'         => $mNotifikasi
        ]);
    }

}
