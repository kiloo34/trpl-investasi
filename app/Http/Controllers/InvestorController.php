<?php

namespace App\Http\Controllers;

use App\User;
use App\Investor;
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
      // dd(investor::where(''));
        $investor = investor::where('id_user',Auth::user()->id)->first();
        // dd($investor);
        return view('investor.index', compact('investor'));
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
        $request->validate([
          'nama' => 'required|String|max:255',
          'email' => 'required|String|email|max:255|unique:users',
          'password' => 'required|String|min:6|confirmed',
          'jenis_kelamin' => 'required|String',
          'no_telp' => 'required|String|max:14'
        ]);

      $user=User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'investor',
      ]);

      Investor::create([
        'no_telp' => $request->no_telp,
        'id_user' => $user->id,
      ]);
      return redirect()->route('investor.index')->with('message', 'Data Investor Berhasil dibuat');
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
        $investor->jenis_kelamin = $request->jenis_kelamin;
        $investor->no_telp = $request->no_telp;

        $investor->save();

        return back()->with('success','Profil Telah Diperbarui');
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
