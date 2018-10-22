<?php

namespace App\Http\Controllers;

use App\User;
use App\Peternak;
use App\Produk;
use App\Kontrak;
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
        if (Auth::check()) {
            if (Auth::user()->role=='peternak') {
                $peternak = Peternak::where('id_user', Auth::user()->id)->first();
                // dd($peternak);
                return view('peternak.index', compact('peternak'));
            }  else {
                abort(404);
            }
        } else {
            return view('beranda.index');
        }

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
        // dd($request->file('foto_profil'));

        $request->validate([
            'nama' => 'required|String|max:255',
            'email' => 'required|String|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'alamat' => 'required|String|max:255',
            'kabupaten' => 'required|String|max:255',
            'kecamatan' => 'required|String|max:255',
            'kelurahan' => 'required|String|max:255',
            'foto_kandang' => 'required',
            'foto_ktp' => 'required',
            'foto_profil' => 'required',
            'no_ktp' => 'required|String|max:255',
            'no_telp' => 'required|String|max:255',
            'tgl_lahir' => 'required|String|max:255'
        ]);

        // dd('losssss');

        $user=User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 'belum aktif',
            'role' => 'peternak',
        ]);

        // dd('losssss');

        $f_p = $request->file('foto_profil')->store('public');
        $f_p = str_replace('public', '', $f_p);
        $f_p = str_replace('\\', '/', $f_p);
        $f_p = asset('storage'.$f_p);

        $f_ktp = $request->file('foto_ktp')->store('public');
        $f_ktp = str_replace('public', '', $f_ktp);
        $f_ktp = str_replace('\\', '/', $f_ktp);
        $f_ktp = asset('storage'.$f_ktp);

        $f_kandang = $request->file('foto_kandang')->store('public');
        $f_kandang = str_replace('public', '', $f_kandang);
        $f_kandang = str_replace('\\', '/', $f_kandang);
        $f_kandang = asset('storage'.$f_kandang);

        Peternak::create([
            'alamat' => $request->alamat,
            'provinsi' =>$request->provinsi,
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'foto_kandang' => $f_kandang,
            'foto_ktp' => $f_ktp,
            'foto_profil' => $f_p,
            'no_ktp' => $request->no_ktp,
            'no_telp' => $request->no_telp,
            'tgl_lahir' => $request->tgl_lahir,
            'id_user' => $user->id,
        ]);
        // dd('losssss');

        return redirect()->route('profil.index')->with('message', 'Data Peternak berhasil dibuat');

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

        // dd($request);

        $user = User::findOrFail($id);
        $user->nama = $request->nama;

        $user->save();

        // dd($request);

        $f_p = $request->file('foto_profil')->store('public');
        $f_p = str_replace('public', '', $f_p);
        $f_p = str_replace('\\', '/', $f_p);
        $f_p = asset('storage'.$f_p);

        $f_ktp = $request->file('foto_ktp')->store('public');
        $f_ktp = str_replace('public', '', $f_ktp);
        $f_ktp = str_replace('\\', '/', $f_ktp);
        $f_ktp = asset('storage'.$f_ktp);

        $f_kandang = $request->file('foto_kandang')->store('public');
        $f_kandang = str_replace('public', '', $f_kandang);
        $f_kandang = str_replace('\\', '/', $f_kandang);
        $f_kandang = asset('storage'.$f_kandang);


        $peternak = Peternak::where('id_user',Auth::user()->id)->first();;
        $peternak->alamat = $request->alamat;
        $peternak->provinsi = $request->provinsi;
        $peternak->kabupaten = $request->kabupaten;
        $peternak->kecamatan = $request->kecamatan;
        $peternak->kelurahan = $request->kelurahan;
        $peternak->foto_kandang = $f_kandang;
        $peternak->foto_ktp = $f_ktp;
        $peternak->foto_profil = $f_p;
        $peternak->jenis_kelamin = $request->jenis_kelamin;
        $peternak->no_ktp = $request->no_ktp;
        $peternak->no_telp = $request->no_telp;
        $peternak->tgl_lahir = $request->tgl_lahir;

        $peternak->save();

        return back()->with('msg_succes', 'Profil Telah Diperbarui');
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

    public function produk(){
        if (Auth::check()) {
            if (Auth::user()->role=='peternak') {
                $produk = Produk::paginate(2);
                return view('produk.index', ['produk' => $produk]);
            } else {
                abort(404);
            }
        }
    }

    public function tambah_produk(Request $request){

        // dd($request->all());

        $request->validate([
            'foto_produk'       => 'required',
            'nama_produk'       => 'required|String|max:255',
            'harga'             => 'required|integer',
            'periode'           => 'required|String',
            'stock'             => 'required|integer',
            'deskripsi'         => 'required|String',
            'profilResiko'      => 'required|String',
            'rencanaPengelolaan'=> 'required|String',
            'struktur'          => 'required|String',
            'term'              => 'required|String',
        ]);



        $f_produk = $request->file('foto_produk')->store('public');
        $f_produk = str_replace('public', '', $f_produk);
        $f_produk = str_replace('\\', '/', $f_produk);
        $f_produk = asset('storage'.$f_produk);

        $kontrak = Kontrak::create([
            'profilResiko' => $request->profilResiko,
            'rencanaPengelolaan' => $request->rencanaPengelolaan,
            'struktur' => $request->struktur,
            'term' => $request->term,
        ]);

        // dd(Peternak::where('id_user',$request->user()->id)->first()->id);
        // dd($request->user()->peternak->id);

        $produk = Produk::create([
            'foto_produk' => $f_produk,
            'nama_produk' => $request->nama_produk,
            'harga' =>$request->harga,
            'periode' => $request->periode,
            'stock' => $request->stock,
            'deskripsi' => $request->deskripsi,
            // dd($request),
            'id_peternak' => Peternak::where('id_user',$request->user()->id)->first()->id,
            'id_kontrak' => $kontrak->id,
        ]);

        return redirect()->route('produk.index')->with('message', 'Data Produk berhasil ditambah');
    }

    public function update_produk(Request $request, $id){

    }

}
