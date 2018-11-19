<?php

namespace App\Http\Controllers;

use Auth;
use App\Pesanan;
use App\Pembayaran;
use App\Produk;
use App\Investor;
use App\Saldo;
use App\User;
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
            ]);
        }
        else {
            $data = Pesanan::with('pembayaran.pesanan.produk', 'investor.user', 'pembayaran.mutasi.saldo')->where('id_investor', Auth::user()->investor()->first()->id)->get();
            // $admin = User::where('id', Auth::user()->role == 'admin ' )->get();
            // dd($admin);
            return view('pesan.index', [
                'data'      => $data,
                'title'     => 'List Pesanan',
                'active'    => 'order.index',
            ]);
        }
    }

    // public function detail($id)
    // {
    //     // dd('masuk');
    //     $id_pesanan = $id;
    //     $data = Pesanan::with('produk.pesanan.pembayaran')->where('id_pembayaran', $id)->first();
    //     dd($data);
    //     return view('pesan.detail', [
    //         'data'  => $data,
    //         'title' => 'Detail Pesanan',
    //         'active'=> 'order.detail'
    //     ]);
    // }

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
        $request->validate([
            'kuantitas' => 'required|integer',
            'total'     => 'required',
        ]);

        $pembayaran = Pembayaran::create([
            'pembayaran'    => $request->pembayaran,
        ]);

        Pesanan::create([
            'kuantitas'     => $request->kuantitas,
            'total'         => $request->total,
            'status'        => 'Menunggu Pembayaran',
            'id_investor'   => Investor::where('id_user',$request->user()->id)->first()->id,
            'id_produk'     => $request->id_produk,
            'id_pembayaran' => $pembayaran->id
        ]);

        $produk = Produk::findOrFail($request->id_produk);

        $produk->update([
            'stock' => $produk->stock - $request->kuantitas
        ]);

        return redirect()->route('order.index')->with('success_msg', 'data Pesanan Berhasil dibuat');

    }

    public function pembayaran(Request $request)
    {
        $request->validate([
            'bukti' => 'required'
        ]);

        $bukti = $request->file('bukti')->store('public');
        $bukti = str_replace('public', '', $bukti);
        $bukti = str_replace('\\', '/', $bukti);
        $bukti = asset('storage'.$bukti);

        $pembayaran = Pembayaran::findOrFail($request->id_pembayaran);

        $pembayaran->update([
            'bukti' => $bukti
        ]);

        // $user = User::where(Auth::user()->role == 'admin');
        // dd($user);

        // $notifikasi = Notifikasi::create([
        //     'subject'   => 'ada Balasan Diskusi dari '. Auth::user()->nama,
        //     'id_diskusi'=> $id,
        //     'id_user'   => Auth::user()->role == 'admin',
        // ]);

        return redirect()->route('order.index')->with('success_msg', 'Bukti Berhasil diUpload, Menunggu Verifikasi');
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
