<?php

namespace App\Http\Controllers;

use Auth;
use App\Balas;
use App\Diskusi;
use App\Produk;
use App\Peternak;
use App\Investor;
use App\Notifikasi;
use App\User;
use Illuminate\Http\Request;

class DiskusiController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $id_produk = $id;
        $diskusi = Diskusi::with('produk.peternak.user')->where('id_produk',$id)->get();

        $id_user = auth()->user()->id;
        $user = User::find($id_user);

        // dd($diskusi);

        return view('diskusi.index',[
            'diskusi'=>$diskusi,
            'user'=>$user,
            'id_produk'=>$id_produk,
            // dd($diskusi)
        ]);
    }

    public function balas_index($id)
    {
        $id_diskusi = $id;
        $data = Balas::join('diskusi', 'diskusi.id', '=', 'balas.id_diskusi')->where('id_diskusi', $id)->first();
        $balas = Balas::with('diskusi.balas.user', 'diskusi.produk.peternak.user')->where('id_diskusi', $id)->get();
        // dd($data->judul);
        return view('diskusi.balas', [
            'balas'     => $data,
            'data'      => $balas,
            'tittle'    => 'Saldo',
            'active'    => 'balas.balas_index',
            'id_diskusi'=> $id_diskusi
            // 'createLink'=> route('order.balas')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diskusi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'judul'=> 'required',
            'body' => 'required',
        ]);

        $diskusi = Diskusi::create([
            'judul'     => $request->judul,
            'body'      => $request->body,
            'id_user'   => Auth::user()->id,
            'id_produk' => $id
        ]);

        $notifikasi = Notifikasi::create([
            'subject'   => 'ada Diskusi Produk dari '. Auth::user()->nama,
            'id_diskusi'=> $diskusi->id,
            'id_user'   => $request->id_user,
        ]);

        return redirect()->route('diskusi.index', $id)->with('msg', 'komentar berhasil ditambah');
    }

    public function balas(Request $request, $id)
    {
        $this->validate($request, [
            'balas' => 'required',
        ]);

        $balas = Balas::create([
            'balas'     => $request->balas,
            'id_diskusi'=> $id,
            'id_user'   => Auth::user()->id,
        ]);

        $notifikasi = Notifikasi::create([
            'subject'   => 'ada Balasan Diskusi dari '. Auth::user()->nama,
            'id_diskusi'=> $id,
            'id_user'   => $request->id_user,
        ]);

        return redirect()->route('diskusi.balas_index', $id);
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
