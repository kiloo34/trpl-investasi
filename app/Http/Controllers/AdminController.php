<?php

namespace App\Http\Controllers;

use Auth;
use App\Investor;
use App\Peternak;
use App\Produk;
use App\Pesanan;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function __construct(){
    //     $this->middleware('role:admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user());
        $peternak = Peternak::all();
        $investor = Investor::all();
        $produk = Produk::all();
        $pesanan = Pesanan::all();
        return view('admin.index', [
            'peternak'=> $peternak,
            'investor' => $investor,
            'produk' => $produk,
            'pesanan' => $pesanan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        // dd('masuk');
        $produk->delete();
        return redirect()->route('admin.produk')->with('success_msg', 'berhasil dihapus');
    }

    public function verifikasi(Request $r, User $user)
    {
        $user->update([
            'status'=>'aktif',
        ]);
        // dd('1');
        return redirect()->back()->with('success_msg','Peternak berhasil diverifikasi');
    }

    public function investor(){
        $investor = Investor::all();
        // dd($investor);
        return view('admin.investor', compact('investor'));
    }

    public function peternak(){
        $peternak = Peternak::all();
        // dd($investor);
        return view('admin.peternak', compact('peternak'));
    }

    public function produk(){
        $produk = Produk::all();
        // dd($investor);
        return view('admin.produk', compact('produk'));
    }
}
