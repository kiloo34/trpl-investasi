<?php

namespace App\Http\Controllers;

use Auth;
use App\Bank;
use App\AkunBank;
use App\User;
use validator;
use Illuminate\Http\Request;

class BankController extends Controller
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
            $bank = Bank::all();
            $data = AkunBank::with('bank.akun_bank', 'user', 'bank')->where('id_user', Auth::user()->id)->get();
            // $data = Bank::with('bank')->get();
            // $data = AkunBank::where('id_user', Auth::user()->id)->first();
            // dd($data);


            return view('admin.akunBank', [
                'data'      => $data,
                'bank'      => $bank,
                'title'     => 'List Bank',
                'active'    => 'bank.index',
                'createLink'=>route('bank.create')
            ]);
            dd($data);

        } else {
            $bank = Bank::all();
            $data = AkunBank::with('bank.akun_bank')->where('id_user', Auth::user()->id)->get();

            return view('investor.akunBank', [
                'data'      => $data,
                'bank'      => $bank,
                'title'     => 'List Bank',
                'active'    => 'bank.index',
                'createLink'=>route('bank.create')
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bank.tambah', [
            'title'         => 'Tambah Bank',
            'modul_link'    => route('bank.index'),
            'modul'         => 'Bank',
            'action'        => route('bank.store'),
            'active'        => 'bank.index'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_bank' => 'required',
        ]);

        Bank::create([
            'nama_bank' => $request->nama_bank,
        ]);

        return redirect()->route('bank.index')->with('message', 'Bank Berhasil dibuat');

    }

    public function akun(Request $request, User $user, Bank $bank)
    {
        $request->validate([
            'an'    => 'required',
            'no_rek'=> 'required'
        ]);

        $id_bank = $request->id_bank;
        $bank = Bank::find($id_bank)->first();

        AkunBank::create([
            'an'        => $request->an,
            'no_rek'    => $request->no_rek,
            'id_user'   => Auth::user()->id,
            'id_bank'   => $bank->id
        ]);

        return redirect()->route('bank.index')->with('message', 'Akun Bank Berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        $request->validate([
            'nama_bank'=>'required',
        ]);
        $bank->update([
            'nama_bank'=>$request->nama_bank,
        ]);
        return redirect()->route('bank.index')->with('success_msg', 'Bank berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        return redirect()->route('bank.index')->with('success_msg', 'Bank berhasil dihapus');
    }
}
