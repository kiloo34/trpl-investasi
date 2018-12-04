<?php

namespace App\Http\Controllers;

use App\User;
use App\Investor;
use App\Produk;
use App\Progres;
use App\Pesanan;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'investor') {
                $investor = investor::where('id_user', Auth::user()->id)->first();
                return view('investor.index', [
                    'investor' => $investor,
                ]);
            } else {
                abort(404);
            }
        } else {
            return view('beranda.index');
        }
    }

    public function pantau($id)
    {
        $pesanan = Pesanan::join('produk', 'pesanan.id_produk', '=', 'produk.id')->join('investor', 'pesanan.id_investor', '=', 'investor.id')->find($id);

        $progres = Progres::with('pesanan.produk')->where('id_pesanan', $id)->get();
        // $progres = Pesanan::with('produk.pesanan.progres')->where('id', $id)->get();
        // dd($progres);
        return view('progres.index', [
            'data' => $pesanan,
            'progres' => $progres
        ]);
    }

    public function produk()
    {
        $produk = Produk::all();
        return view('produk.index', ['produk' => $produk]);
        dd($produk);
    }

    public function akun_bank()
    {
        $bank = Bank::all();
        return view('investor.akunBank', [
            'bank' => $bank
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
        // dd('masuk sini');

        $request->validate([
            'nama' => 'required|String|max:255',
            'email' => 'required|String|email|max:255|unique:users',
            'password' => 'required|String|min:6|confirmed',
            'jenis_kelamin' => 'required|String',
            'no_telp' => 'required|String|max:14'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'aktif',
            'role' => 'investor',
        ]);

        Investor::create([
            'no_telp' => $request->no_telp,
            'id_user' => $user->id,
        ]);

        return redirect()->route('beranda')->with('success_msg', 'Data Investor Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

        // dd($request->all());

        $user = User::findOrFail($id);
        $user->nama = $request->nama;

        $user->save();

        $investor = Investor::where('id_user', Auth::user()->id)->first();
        $investor->no_ktp = $request->no_ktp;
        $investor->jenis_kelamin = $request->jenis_kelamin;
        $investor->no_telp = $request->no_telp;

        $investor->save();

        return back()->with('success_msg', 'Profil Telah Diperbarui');
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

    public function tProgres(Request $request, $id)
    {
        $pesanan = Pesanan::join('produk', 'pesanan.id_produk', '=', 'produk.id')->join('investor', 'pesanan.id_investor', '=', 'investor.id')->find($id);
        $progres = Progres::with('pesanan.produk')->where('id_pesanan', $id)->get();
        // dd($progres);
        return view('progres.index', [
            'data' => $pesanan,
            'progres' => $progres
        ]);
    }
}
