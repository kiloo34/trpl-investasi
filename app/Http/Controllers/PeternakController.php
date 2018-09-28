<?php

namespace App\Http\Controllers;

use App\User;
use App\Peternak;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PeternakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peternak = Peternak::where('id_user',Auth::user()->id)->first();
        // dd($investor);
        return view('peternak.index', compact('peternak'));
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
          'password' => 'required|string|min:6|confirmed',
          'alamat' => 'required|String|max:255',
          'kabupaten' => 'required|String|max:255',
          'kecamatan' => 'required|String|max:255',
          'kelurahan' => 'required|String|max:255',
          'foto_kandang' => 'required|String|max:255',
          'foto_ktp' => 'required|String|max:255',
          'foto_profil' => 'required|String|max:255',
          'no_ktp' => 'required|String|max:255',
          'no_telp' => 'required|String|max:255',
          'tgl_lahir' => 'required|String|max:255'
        ]);

        $user=User::create([
          'nama' => $request->nama,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role' => 'peternak',
        ]);

        Peternak::create([
          'alamat' => $request->alamat,
          'provinsi' =>$request->provinsi,
          'kabupaten' => $request->kabupaten,
          'kecamatan' => $request->kecamatan,
          'kelurahan' => $request->kelurahan,
          'foto_kandang' => $request->foto_kandang,
          'foto_ktp' => $request->foto_ktp,
          'foto_profil' => $request->foto_profil,
          'no_ktp' => $request->no_ktp,
          'tgl_lahir' => $request->tgl_lahir,
          'id_user' => $user->id,
        ]);
        return redirect()->view('peternak.index')->with('message', 'Data Peternak berhasil dibuat');

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
    public function edit(Request $request, $id)
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

      $user = User::findOrFail($id);
      $user->nama = $request->nama;

      $user->save();

      $peternak = Peternak::where('id_user',Auth::user()->id);


      $request->except ('_token');
      $request->except ('_method');

      $peternak->first();
      return back();
      
      // return redirect()->view('peternak.index')->with('message', 'Data Peternak berhasil Diperbarui');

      // dd($request->all());
      // $request->validate([
      //   'nama' => 'required|max:255',
      //   'no_telp' => 'required|max:255',
      //   'tgl_lahir' => 'required|max:255'
      // ]);
      //
      // dd('masuk');
      //
      // $user = User::find($id);
      // $user->nama = $request->nama;
      // $user->save();
      //
      // $peternak = Peternak::where('id_user',Auth::user()->id);
      // $peternak->no_telp = $request->no_telp;
      // $peternak->tgl_lahir = $request->tgl_lahir;
      // $peternak->save();
      //
      // return redirect()->view('peternak.index')->with('message', 'Data Peternak berhasil Diperbarui');
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
