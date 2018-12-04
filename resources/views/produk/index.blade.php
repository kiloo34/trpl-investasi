@section('tittle', 'List Produk')

@extends('view')

@include('navbar')

@section('content')
    {{-- {{dd($errors->all())}} --}}
    {{-- <div class="container"> --}}
        <div class="row">
            <div class="col-md-2">
                <br>
                <nav class="navbar bg-dark navbar-dark">

                    <!-- Links -->
                    <ul class="navbar-nav" style="height: 100%;">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('beranda') }}">Beranda</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('produk.index') }}">Produk</a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="col-md-10">
                <br>
                <h1>List Produk</h1>
                {{-- {{ dd(count($produk)) }} --}}
                @include('msg_succes')
                @if (Auth::check())
                    @if (Auth::user()->role=="investor")
                        <div class="row">
                            @foreach ($produk as $p)
                                <div class="col-md-4">
                                    <!--Card-->
                                    <div class="card">
                                        <!--Card image-->
                                        <img class="img-fluid" src="{{ $p->foto_produk }}" alt="Card image cap" style="max-height: 150px;">

                                        <!--Card content-->
                                        <div class="card-body">
                                            <h4 class="card-title">{{ $p->nama_produk }}</h4>
                                            <p class="card-text">{{ $p->deskripsi }}</p>
                                            <div class="form-group has-feedback {{ $errors->has('total') ? 'has_error' : '' }}">
                                                <label for="foto_produk" class="control-label">{{__('Harga')}}:</label>
                                                <span>
                                                    <input class="form-control" type="text" value="{{$p->harga}}" readonly id="hargaProduk">
                                                </span>
                                            </div>
                                            {{-- <div class="form-group has-feedback {{ $errors->has('kuantitas') ? 'has_error' : '' }}">
                                                <label for="foto_produk" class="control-label">{{__('Kuantitas')}}:</label>
                                                <span>
                                                    <input class="form-control" type="number" placeholder="" onkeyup="hitungTotal()" id="qty">
                                                </span>
                                            </div> --}}
                                            <div class="form-group has-feedback {{ $errors->has('stock') ? 'has_error' : '' }}">
                                                <label for="foto_produk" class="control-label">{{__('Stock')}}:</label>
                                                <span>
                                                    <input class="form-control" type="text" placeholder="0" readonly value="{{$p->stock}}" >
                                                </span>
                                            </div>
                                            @if ($p->stock > 0 )
                                                <a href="{{ route('order.tambah', $p->id) }}" class="btn btn-primary btn-sm">Pesan Slot</a>
                                            @endif
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail-{{$p->id}}" data-whatever="@fat">Detail</button>
                                            <a href="/diskusi/{{$p->id}}" class="btn btn-info btn-sm" data-target=""> Komentar </a>
                                        </div>
                                    </div>
                                <!--/.Card-->
                                </div>
                            @endforeach

                            @foreach ($produk as $p)
                                <div class="modal fade" id="btn-detail-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="email" class="col-lg-3 col-form-label">Foto Produk</label>
                                                    <div class="col-lg-9 col-md-6 col-sm-3">
                                                        <img src="{{ old('foto_produk') ? old('foto_produk') : $p->foto_produk }}" class="img-responsive" alt="Cinque Terre" width="304" height="236">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-lg-3 col-form-label">Nama Produk</label>
                                                    <div class="col-lg-9 col-md-6 col-sm-3">
                                                        <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('nama_produk') ? old('nama_produk') : $p->nama_produk}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-lg-3 col-form-label">Harga</label>
                                                    <div class="col-lg-9 col-md-6 col-sm-3">
                                                        <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $p->harga}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-lg-3 col-form-label">Stock</label>
                                                    <div class="col-lg-9 col-md-6 col-sm-3">
                                                        <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $p->stock}}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="nama" class="col-lg-3 col-form-label">Peternak</label>
                                                    <div class="col-lg-9 col-md-6 col-sm-3">
                                                        <input type="judul" readonly class="form-control-plaintext" id="static" value="{{ old('id_peternak') ? old('id_peternak') : $p->peternak->user->nama}}">
                                                    </div>
                                                </div>
                                                {{-- <div class="accordion">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <a class="card-link" data-toggle="collapse" href="#collapseOne">Peternak</a>
                                                        </div>
                                                        <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                            <label style="padding: 7px; display: inline-block; width: 30%; margin: 0;">Nama</label>
                                                            <div style="display: inline-block;width: 70%;float: right;">
                                                                <input type="judul" readonly class="form-control-plaintext" id="static" value="{{ old('nama') ? old('nama') : $p->peternak->user->nama}}">
                                                            </div>
                                                            <label style="padding: 7px; display: inline-block; width: 30%; margin: 0;">alamat</label>
                                                            <div style="display: inline-block;width: 70%;float: right;">
                                                                <input type="judul" readonly class="form-control-plaintext" id="static" value="{{ old('alamat') ? old('alamat') : $p->peternak->alamat}}">
                                                            </div>
                                                            <label style="padding: 7px; display: inline-block; width: 30%; margin: 0;">Foto Profil</label>
                                                            <div style="display: inline-block;width: 70%;float: right;">
                                                                <img src="{{ $p->peternak->foto_profil }}" class="img-responsive" alt="Cinque Terre" width="304" height="236">
                                                            </div>
                                                            <label style="padding: 7px; display: inline-block; width: 30%; margin: 0;">Foto KTP</label>
                                                            <div style="display: inline-block;width: 70%;float: right;">
                                                                <img src="{{ $p->peternak->foto_ktp }}" class="img-responsive" alt="Cinque Terre" width="304" height="236">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                                <div class="accordion mt-5" id="kontrak" >
                                                    <div class="card">
                                                        <div class="card-header" id="judul">
                                                            <h5 class="mb-0">
                                                                <button class="badge badge-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Peternak
                                                                </button>
                                                            </h5>
                                                        </div>
                                                    
                                                        <div id="collapseOne" class="collapse show" aria-labelledby="judul" data-parent="#kontrak">
                                                            <div class="card-body">
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">{{ old('nama') ? old('nama') : $p->peternak->user->nama}}</li>
                                                                    <li class="list-group-item">{{ $p->peternak->alamat }} {{ $p->peternak->kelurahan }} {{ $p->peternak->kecamatan }} {{ $p->peternak->kabupaten }} {{ $p->peternak->provinsi }}</li>
                                                                    <li class="list-group-item"><img src="{{ $p->peternak->foto_ktp }}" class="img-responsive" alt="Cinque Terre" width="304" height="236"></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else 
                        <div class="row">
                            @if (count($produk) > 0)
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Foto Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Periode</th>
                                                <th>Stock</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                {{-- {{dd($produk)}} --}}
                                            @foreach ($produk as $p)
                                                <tr>
                                                    <td> {{ $loop->iteration }} </td>
                                                    <td> <img class="img-fluid" src="{{ $p->foto_produk }}" alt="Card image cap"> </td>
                                                    <td> {{ $p->nama_produk }} </td>
                                                    <td> {{ $p->harga }} </td>
                                                    <td> {{ $p->periode }} </td>
                                                    <td> {{ $p->stock }} </td>
                                                    <td> {{ $p->deskripsi }} </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#btn-detail-{{$p->id}}" data-whatever="@fat">Detail</button>
                                                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#btn-ubah-{{$p->id}}" data-whatever="@fat">Ubah</button>
                                                        </div>
                                                        <hr>
                                                        <a href="/diskusi/{{$p->id}}" class="btn btn-warning btn-sm" data-target=""> Komentar <span class="badge badge-light"> {{count($p->diskusi)}} </span></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Foto Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Periode</th>
                                                <th>Stock</th>
                                                <th>Deskripsi</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                {{-- {{ $produk->onEachSide(6)->links() }} --}}
                                {{-- {{$produk->links()}} --}}

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#btn-tambah" data-whatever="@fat"> Tambah </button>

                                {{-- modal tambah --}}

                                <div class="modal fade" id="btn-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Produk</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('peternak.tambah_produk') }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group has-feedback {{ $errors->has('foto_produk') ? 'has_error' : '' }}">
                                                        <label for="foto_produk" class="control-label">{{__('Foto Produk')}}:</label>
                                                        <input name="foto_produk" value="{{ old('foto_produk') }}" type="file" class="form-control" placeholder="Foto Produk" required>
                                                        @if ($errors->has('foto_produk'))
                                                            <span class="help-block">{{ $errors->has('foto_produk') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('nama_produk') ? 'has_error' : '' }}">
                                                        <label for="nama_produk" class="control-label">{{__('Nama Produk')}}:</label>
                                                        <input name="nama_produk" value="{{ old('nama_produk') }}" type="text" class="form-control" placeholder="Nama Produk" required>
                                                        @if ($errors->has('nama_produk'))
                                                            <span class="help-block">{{ $errors->has('nama_produk') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('harga') ? 'has_error' : '' }}">
                                                        <label for="harga" class="control-label">{{__('Harga')}}:</label>
                                                        <input name="harga" value="{{ old('harga') }}" type="text" class="form-control" placeholder="Harga" required>
                                                        @if ($errors->has('harga'))
                                                            <span class="help-block">{{ $errors->has('harga') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('periode') ? 'has_error' : '' }}">
                                                        <label for="periode" class="control-label">{{__('Periode')}}:</label>
                                                        <input name="periode" value="{{ old('periode') }}" type="text" class="form-control" placeholder="Periode" required>
                                                        @if ($errors->has('periode'))
                                                            <span class="help-block">{{ $errors->has('periode') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('stock') ? 'has_error' : '' }}">
                                                        <label for="stock" class="control-label">{{__('Stock')}}:</label>
                                                        <input name="stock" value="{{ old('stock') }}" type="text" class="form-control" placeholder="Stock" required>
                                                        @if ($errors->has('stock'))
                                                            <span class="help-block">{{ $errors->has('stock') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('deskripsi') ? 'has_error' : '' }}">
                                                        <label for="deskripsi" class="control-label">{{__('Deskripsi')}}:</label>
                                                        <textarea name="deskripsi" value="{{ old('deskripsi') }}" class="form-control" placeholder="Deskripsi" required></textarea>
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('profilResiko') ? 'has_error' : '' }}">
                                                        <label for="profilResiko" class="control-label">{{__('Kontrak')}} :</label>
                                                        <select name="kontrak">
                                                            @foreach ($kontrak as $k)
                                                                <option value="{{ $k->kategori }}"> {{ $k->kategori }} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="__token" value="{{ csrf_token() }}">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- modal detail --}}

                                @foreach ($produk as $produk)
                                    <div class="modal fade" id="btn-detail-{{$produk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Foto Produk</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <img src="{{ $produk->foto_produk }}" class="img-responsive" alt="Cinque Terre" width="304" height="236">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Nama Produk</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('nama_produk') ? old('nama_produk') : $produk->nama_produk}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Harga</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('harga') ? old('harga') : $produk->harga}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Periode</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('periode') ? old('periode') : $produk->periode}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Stock</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('stock') ? old('stock') : $produk->stock}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Profil Resiko</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('profilResiko') ? old('profilResiko') : $produk->kontrak->profilResiko}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Rencana Pengelolaan</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('rencanaPengelolaan') ? old('rencanaPengelolaan') : $produk->kontrak->rencanaPengelolaan}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Struktur</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('struktur') ? old('struktur') : $produk->kontrak->struktur}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="email" class="col-lg-3 col-form-label">Term</label>
                                                        <div class="col-lg-9 col-md-6 col-sm-3">
                                                            <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('term') ? old('term') : $produk->kontrak->term}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- modal ubah --}}
                                {{-- @foreach ($produk as $p) --}}
                                    <div class="modal fade" id="btn-ubah-{{$produk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('peternak.update_produk', [$produk->id])  }}" method="post" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="form-group row">
                                                            <label for="nama_produk" class="col-lg-3 col-form-label">{{__('Nama Produk')}}</label>
                                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                                <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk') ? old('nama_produk') : $produk->nama_produk}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group row">
                                                            <label for="harga" class="col-lg-3 col-form-label">{{__('Harga')}}</label>
                                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                                <input type="text" name="harga" class="form-control" value="{{ old('harga') ? old('harga') : $produk->harga}}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="periode" class="col-lg-3 col-form-label">{{__('Periode')}}</label>
                                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                                <input type="text" name="periode" class="form-control" value="{{ old('periode') ? old('periode') : $produk->periode}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group row">
                                                            <label for="stock" class="col-lg-3 col-form-label">{{__('Stock')}}</label>
                                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                                <input type="text" name="stock" class="form-control" value="{{ old('stock') ? old('stock') : $produk->stock}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group row">
                                                            <label for="deskripsi" class="col-lg-3 col-form-label">{{__('Deskripsi')}}</label>
                                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                                <input type="text" name="deskripsi" class="form-control" value="{{ old('deskripsi') ? old('deskripsi') : $produk->deskripsi}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="form-group row">
                                                            <label for="foto_produk" class="col-lg-3 col-form-label">{{ __('Foto Produk') }}</label>
                                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                                <input type="file" name="foto_produk" class="form-control" value="{{ old('foto_produk') ? old('foto_produk') : $produk->foto_produk}}" required>
                                                            </div>
                                                        </div>

                                                        <div class="form-group has-feedback {{ $errors->has('profilResiko') ? 'has_error' : '' }}">
                                                            <label for="profilResiko" class="control-label">{{__('Kontrak')}} :</label>
                                                            <select name="kontrak">
                                                                @foreach ($kontrak as $k)
                                                                    <option value="{{ $k->kategori }}"> {{ $k->kategori }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <input type="hidden" name="_method" value="PUT">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- @endforeach --}}
                                
                            @else
                                <h1>Anda Belum Mempunyai Produk</h1>

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#btn-tambah" data-whatever="@fat"> Tambah </button>

                                <div class="modal fade" id="btn-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel">Tambah Produk</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('peternak.tambah_produk') }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <div class="form-group has-feedback {{ $errors->has('foto_produk') ? 'has_error' : '' }}">
                                                        <label for="foto_produk" class="control-label">{{__('Foto Produk')}}:</label>
                                                        <input name="foto_produk" value="{{ old('foto_produk') }}" type="file" class="form-control" placeholder="Foto Produk" required>
                                                        @if ($errors->has('foto_produk'))
                                                            <span class="help-block">{{ $errors->has('foto_produk') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('nama_produk') ? 'has_error' : '' }}">
                                                        <label for="nama_produk" class="control-label">{{__('Nama Produk')}}:</label>
                                                        <input name="nama_produk" value="{{ old('nama_produk') }}" type="text" class="form-control" placeholder="Nama Produk" required>
                                                        @if ($errors->has('nama_produk'))
                                                            <span class="help-block">{{ $errors->has('nama_produk') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('harga') ? 'has_error' : '' }}">
                                                        <label for="harga" class="control-label">{{__('Harga')}}:</label>
                                                        <input name="harga" value="{{ old('harga') }}" type="text" class="form-control" placeholder="Harga" required>
                                                        @if ($errors->has('harga'))
                                                            <span class="help-block">{{ $errors->has('harga') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('periode') ? 'has_error' : '' }}">
                                                        <label for="periode" class="control-label">{{__('Periode')}}: <small>(dalam satuan Tahun)</small></label>
                                                        <input name="periode" value="{{ old('periode') }}" type="text" class="form-control" placeholder="Periode" required>
                                                        @if ($errors->has('periode'))
                                                            <span class="help-block">{{ $errors->has('periode') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('stock') ? 'has_error' : '' }}">
                                                        <label for="stock" class="control-label">{{__('Stock')}}:</label>
                                                        <input name="stock" value="{{ old('stock') }}" type="text" class="form-control" placeholder="Stock" required>
                                                        @if ($errors->has('stock'))
                                                            <span class="help-block">{{ $errors->has('stock') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group has-feedback {{ $errors->has('deskripsi') ? 'has_error' : '' }}">
                                                        <label for="deskripsi" class="control-label">{{__('Deskripsi')}}:</label>
                                                        <textarea name="deskripsi" value="{{ old('deskripsi') }}" class="form-control" placeholder="Deskripsi" required></textarea>
                                                    </div>
                                                    <input type="hidden" name="__token" value="{{ csrf_token() }}">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endif
            </div>
        </div>
    {{-- </div> --}}

    <script type="text/javascript">
        function hitungTotal() {
            var qty = Number($('#qty').val());
            var hargaProduk = Number($('#hargaProduk').val());
            var total = qty * hargaProduk;
            $("#total").val(total);
        }
    </script>
@endsection

