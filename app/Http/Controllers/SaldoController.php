<?php

namespace App\Http\Controllers;

use Auth;
use App\AkunBank;
use App\Bank;
use App\Saldo;
use App\Mutasi;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (Auth::user()->role == 'investor')
        {
            // $data = Saldo::with('mutasi.akun_bank', 'investor')->where('id_investor', Auth::user()->investor()->first()->id)->get();
            $data = Saldo::with('mutasi.akun_bank', 'investor')->join('mutasi', 'saldo.id', '=', 'mutasi.id_saldo')->where('id_investor', Auth::user()->investor()->first()->id)->get();
            $saldo = Saldo::with('mutasi.akun_bank', 'investor')->where('id_investor', Auth::user()->investor()->first()->id)->first();
            $akunBank = AkunBank::with('bank.akun_bank')->where('id_user', Auth::user()->id)->get();
            // $akunBank = AkunBank::with('bank.akun_bank')->where('id_user', Auth::user()->id)->get();

            // dd($saldo);

        }
        return view('investor.saldo', [
            'saldo'     => $saldo,
            'data'      => $data,
            'akunBank'  => $akunBank,
            'tittle'    => 'Saldo',
            'active'    => 'investor.saldo',
            // 'createLink'=> route('order.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('investor.saldo', [
            'title'         => 'Tarik Saldo',
            'modul_link'    => route('saldo.index'),
            'modul'         => 'Saldo',
            'action'        => route('Saldo.store'),
            'active'        => 'Saldo.index'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Bank $bank, Saldo $saldo)
    {
        $request->validate([
            'nominal'   => 'required',
        ]);
            // dd($request->id_akunBank);
        Mutasi::create([
            'nominal'       => $request->nominal,
            'Status'        => 'dalam pengajuan',
            'id_akun_bank'  => $request->id_akunBank,
            'id_saldo'      => $request->saldo
        ]);

        $saldo = Saldo::findOrFail($request->saldo);
// dd($saldo);
        $saldo->update([
            'sAwal'     => $saldo->saldo,
            'saldo'     => $saldo->saldo - $request->nominal,
        ]);

        return redirect()->route('saldo.index');
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
