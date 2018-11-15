<?php

namespace App\Http\Controllers;

use Auth;
use App\Pesanan;
use App\Produk;
use App\Investor;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];

        if (Auth::user()->role == 'admin') {
            $data = Pesanan::with('pesanan', 'investor')->get();

            return view('pesan.index', [
                'data'      => $data,
                'title'     => 'List Pesanan',
                'active'    => 'order.index',
                // 'createLink'=>route('order.tambah'),
            ]);
        }
        else {
            // dd($data = Pesanan::with('investor.pesanan', 'investor'));
            // $data = Pesanan::with('pesanan', 'investor')->where('id_investor', Auth::user()->investor()->first()->id)->get();
            $data = Pesanan::where('id_investor', Auth::user()->investor()->first()->id)->get();
            // dd($data);
            return view('Pesan.index', [
                'data'      => $data,
                'title'     => 'List Pesanan',
                'active'    => 'order.index',
                // 'createLink'=>route('order.tambah'),
            ]);
            dd($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
    }

    public function tambah($id)
    {
        $produk = Produk::find($id);
        // dd($produk);
        return view('pesan.tambah', [
            'produk'        => $produk,
            'title'         => 'Tambah Slot',
            'modul_link'    => route('order.index'),
            'modul'         => 'Order',
            'action'        => route('order.store', $id),
            'active'        => 'order.index',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Produk $produk)
    {
        // dd('masuk');

        // $produk = Produk::find($id);

        $request->validate([
            'kuantitas' => 'required|integer',
            'total'     => 'required',
        ]);

        // dd($request->id_produk);

        Pesanan::create([
            'kuantitas'     => $request->kuantitas,
            'total'         => $request->total,
            'status'        => 'Menunggu Pembayaran',
            'id_investor'   => Investor::where('id_user',$request->user()->id)->first()->id,
            'id_produk'     => $request->id_produk
        ]);

        $produk = Produk::findOrFail($request->id_produk);
        // $produk->findOrFail($request->id);
        $produk->update([
            'stock' => $produk->stock - $request->kuantitas
        ]);

        // dd($produk);
        return redirect()->route('order.index');

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
