<?php

namespace App\Http\Controllers;

use Auth;
use App\Pesanan;
use App\Pembayaran;
use App\Produk;
use App\Investor;
use App\Saldo;
use App\User;
use App\Mutasi;
use App\Progres;
use App\Notifikasi;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

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

        if (Auth::user()->role == 'peternak') {
            $data = Produk::with('pesanan.pembayaran')->
                            join('pesanan', 'produk.id', '=', 'pesanan.id_produk')->
                            join('investor', 'pesanan.id_investor', '=', 'investor.id')->
                            where('id_peternak', Auth::user()->peternak()->first()->id)->get();

            // $progres = Progres::with('pesanan.produk')->where('id_pesanan', $id)->get();
            // dd($data);
            return view('pesan.index', [
                'data'      => $data,
                // 'progres'   => $progres,
                'title'     => 'List Pesanan',
                'active'    => 'order.index',
            ]);
        }
        elseif (Auth::user()->role == 'investor') {
            $data = Pesanan::with('pembayaran.pesanan.produk', 'investor.user', 'pembayaran.mutasi.saldo')->where('id_investor', Auth::user()->investor()->first()->id)->get();
            // $admin = User::where('role', Auth::user()->role == 'admin ' )->get();
            // dd($admin);
            return view('pesan.index', [
                'data'      => $data,
                'title'     => 'List Pesanan',
                'active'    => 'order.index',
            ]);
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
        // $user = User::get();
        // $admin = User::where('role', $user == ['admin'])->get();
        $produk = Produk::find($id);
        $saldo = Saldo::where('id_investor', Auth::user()->investor()->first()->id)->get();
        // $admin = User::where('role', User::user()->role == 'admin')->get();
        // dd($admin);``
        // dd($saldo);
        return view('pesan.tambah', [
            'produk'        => $produk,
            'saldo'         => $saldo,
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
            'pembayaran'    => 'transfer'
        ]);

        $pesanan = Pesanan::create([
            'kuantitas'     => $request->kuantitas,
            'total'         => $request->total,
            'status'        => 'Menunggu Pembayaran',
            'id_investor'   => Investor::where('id_user',$request->user()->id)->first()->id,
            'id_produk'     => $request->id_produk,
        ]);

        $produk = Produk::findOrFail($request->id_produk);

        $produk->update([
            'stock' => $produk->stock - $request->kuantitas
        ]);

        Progres::create([
            'id_pesanan'    => $pesanan->id
        ]);

        // if ($request->pembayaran == 'saldo') {
        //     // dd($request->id_saldo);
        //     $saldo = Saldo::findOrFail($request->id_saldo);
        //     // dd($saldo);
        //     $saldo->update([
        //         'saldo' => $saldo->saldo - $request->total
        //     ]);

        //     Mutasi::create([
        //         'nominal'       => $request->total,
        //         'Status'        => 'selesai',
        //         'keterangan'    => 'Pembayaran Orderan Id ' . $pembayaran->id,
        //         'id_saldo'      => $saldo->id,
        //         'id_pembayaran' => $pembayaran->id
        //     ]);
        // }

        // dd(User::where('role', $request->user()->role == 'admin')->id);

        // $notifikasi = Notifikasi::create([
        //     'subject'    => 'ada pesanan dari User '. Auth::user()->nama,
        //     'id_pesanan' => $pesanan->id,
        //     'id_user'    => $request->id_user
        // ]);

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
        //     'subject'       => 'ada Pembayaran pesanan dari User '. Auth::user()->nama,
        //     'id_pembayaran' => $pembayaran->id,
        //     'id_user'       => User::where('role', $request->user()->role == 'admin')->first()->id,
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
