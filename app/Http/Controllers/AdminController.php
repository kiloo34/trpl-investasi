<?php

namespace App\Http\Controllers;

use Auth;
use App\Investor;
use App\Peternak;
use App\Produk;
use App\Pesanan;
use App\User;
use App\Bank;
use Illuminate\Http\Request;
use App\Kontrak;
use Illuminate\View\View;
// use Symfony\Component\HttpFoundation\Request;

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
        $bank = Bank::all();
        return view('admin.index', [
            'peternak'=> $peternak,
            'investor' => $investor,
            'produk' => $produk,
            'pesanan' => $pesanan,
            'bank' => $bank,
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
        return redirect()->route('admin.produk')->with('success_msg', 'Produk berhasil dihapus');
    }

    public function verifikasi(Request $r, User $user)
    {
        $user->update([
            'status'=>'aktif',
        ]);
        // dd('1');
        return redirect()->back()->with('success_msg', 'Peternak berhasil diverifikasi');
    }

    public function investor(){
        $investor = Investor::with('akun_bank.investor')->get();
        // dd($investor);
        return view('admin.investor', [
            'investor'  => $investor
        ]);
    }

    public function peternak(){
        $peternak = Peternak::all();
        // dd($investor);
        return view('admin.peternak', [
            'peternak' => $peternak
        ]);
    }

    public function produk(){
        $produk = Produk::all();
        // dd($investor);
        return view('admin.produk', compact('produk'));
    }

    public function pesanan(){
        $pesanan = Pesanan::with('produk.pesanan', 'investor')->get();

        return view('admin.pesanan', [
            'data'      => $pesanan,
            'title'     => 'List Pesanan',
            'active'    => 'order.index',
            // 'createLink'=>route('order.tambah'),
        ]);
    }
    public function verifikasiPembayaran(Request $r, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status' => 'Dalam Proses'
        ]);

        return redirect()->route('admin.pesanan')->with('success_msg', 'Pembayaran Pesanan sudah diverifikasi');
    }

    public function verifikasiPembayaranProg(Request $r, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status' => 'Dana diterukan ke investor'
        ]);

        return redirect()->route('admin.pesanan')->with('success_msg', 'Pembayaran Pesanan sudah diverifikasi');
    }

    public function lanjutkan(Request $r, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status' => 'Berjalan'
        ]);

        return redirect()->route('admin.pesanan')->with('success_msg', 'Pesanan sudah diverifikasi');
    }

    public function batalPesanan(Request $r, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status' => 'Dibatalkan'
        ]);

        return redirect()->route('admin.pesanan')->with('success_msg', 'Pesanan Dibatalkan');
    }

    public function batalVerif(Request $r, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status' => 'Berjalan'
        ]);

        return redirect()->route('admin.pesanan')->with('success_msg', 'Pesanan Dibatalkan');
    }

    public function selesai(Request $r, $id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $pesanan->update([
            'status' => 'selesai'
        ]);

        return redirect()->route('admin.pesanan')->with('success_msg', 'Uang Hasil investasi sudah Diproses investasi telah selesai');
    }

    public function kontrak()
    {
        $kontrak = Kontrak::get();

        return view('admin.kontrak', [
            'kontrak' => $kontrak
        ]);
    }

    public function tambah_kontrak(Request $r)
    {
        $r->validate([
            'kategori' => 'required',
            'profilResiko' => 'required',
            'rencanaPengelolaan' => 'required',
            'struktur' => 'required',
            'term' => 'required'
        ]);

        Kontrak::create([
            'kategori' => $r->kategori,
            'profilResiko' => $r->profilResiko,
            'rencanaPengelolaan' => $r->rencanaPengelolaan,
            'struktur' => $r->struktur,
            'term' => $r->term
        ]);

        return redirect()->route('kontrak')->with('succes_msg', 'Data Kontrak dengan Kategori' . $r->kategori . 'berhasil di Tambahkan');
    }
}
