<?php

namespace App\Http\Controllers;

use App\Diskusi;
use App\Produk;
use App\Peternak;
use App\Investor;
use App\User;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $diskusi = Diskusi::where('id_produk',$id)->get();
        // dd($diskusi);
        $id_user = auth()->user()->id;
        $user = User::find($id_user);
        // $id_produk = produk()->id;
        // $produk = Produk::find($id_produk);
        // $produk = Produk::where('id_produk', produk()->id)->first();
        // dd($diskusi);
        return view('Diskusi.index')->with('diskusi', $diskusi, $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diskusi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'judul'=> 'required',
            'body' => 'required',
        ]);

        $diskusi = $request->user()->diskusi()->create([
            'judul'     => $request->judul,
            'body'      => $request->body,
            'id_produk' => $id,
        ]);

        return redirect()->route('diskusi.index');
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
    public function destroy($id)
    {
        //
    }
}
