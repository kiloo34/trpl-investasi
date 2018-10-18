@section('tittle', 'Produk')

@extends('view')

@include('navbar')

@section('content')
    {{-- {{dd($errors->all())}} --}}
    <div class="container">
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
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="">Diskusi</a>
                        </li>
                        <hr>
                    </ul>

                </nav>
            </div>
            <div class="col-md-10">
                <br>
                <h1>List Produk</h1>
                <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p>

                @if (Auth::check())
                    @if (Auth::user()->role=="investor")
                    <div class="row">
                        @foreach ($produk as $p)
                            <div class="col-md-4">
                                <!--Card-->
                                <div class="card">
                                    <!--Card image-->
                                    <img class="img-fluid" src="{{ $p->foto_produk }}" alt="Card image cap" style="max-height: 160px;">

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title">{{ $p->nama_produk }}</h4>
                                        <!--Text-->
                                        <p class="card-text">{{ $p->deskripsi }}</p>

                                        <div class="form-group has-feedback {{ $errors->has('kuantitas') ? 'has_error' : '' }}">
                                            <label for="foto_produk" class="control-label">{{__('Kuantitas')}}:</label>
                                            <span>
                                                <input class="form-control" type="number" id="stock" placeholder="" >
                                            </span>
                                        </div>
                                        <div class="form-group has-feedback {{ $errors->has('total') ? 'has_error' : '' }}">
                                            <label for="foto_produk" class="control-label">{{__('Total')}}:</label>
                                            <span>
                                                <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
                                            </span>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-sm">Order</a>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail-{{$p->id}}" data-whatever="@fat">Detail</button>
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
                                                    <img src="{{ old('nama_produk') ? old('nama_produk') : $p->foto_produk }}" class="img-responsive" alt="Cinque Terre" width="304" height="236">
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
                                                    <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $p->foto_produk}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-lg-3 col-form-label">Stock</label>
                                                <div class="col-lg-9 col-md-6 col-sm-3">
                                                    <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $p->foto_produk}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-lg-3 col-form-label">Peternak</label>
                                                <div class="col-lg-9 col-md-6 col-sm-3">
                                                    <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $p->id_peternak}}">
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
                    @else
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
                                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail" data-whatever="@fat">Detail</button>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#btn-ubah" data-whatever="@fat">Ubah</button>
                                                </div>
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

                        {{$produk->links()}}


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
                                                <label for="profilResiko" class="control-label">{{__('Profil Resiko')}} :</label>
                                                <textarea name="profilResiko" value="{{ old('profilResiko') }}" class="form-control" placeholder="Profil Resiko" required></textarea>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->has('rencanaPengelolaan') ? 'has_error' : '' }}">
                                                <label for="rencanaPengelolaan" class="control-label">{{__('Rencana Pengelolaan')}} :</label>
                                                <textarea name="rencanaPengelolaan" value="{{ old('rencanaPengelolaan') }}" class="form-control" placeholder="Rencana Pengelolaan" required></textarea>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->has('struktur') ? 'has_error' : '' }}">
                                                <label for="struktur" class="control-label">{{__('Struktur')}} :</label>
                                                <textarea name="struktur" value="{{ old('struktur') }}" class="form-control" placeholder="Struktur" required></textarea>
                                            </div>
                                            <div class="form-group has-feedback {{ $errors->has('term') ? 'has_error' : '' }}">
                                                <label for="term" class="control-label">{{__('Term')}} :</label>
                                                <textarea name="term" value="{{ old('term') }}" class="form-control" placeholder="Term" required></textarea>
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

                        {{-- modal detail --}}

                        <div class="modal fade" id="btn-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        @foreach ($produk as $produk)
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
                                            <label for="email" class="col-lg-3 col-form-label">Foto Produk</label>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $produk->foto_produk}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-lg-3 col-form-label">Foto Produk</label>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $produk->foto_produk}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-lg-3 col-form-label">Foto Produk</label>
                                            <div class="col-lg-9 col-md-6 col-sm-3">
                                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('foto_produk') ? old('foto_produk') : $produk->foto_produk}}">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- modal ubah --}}

                        <div class="modal fade" id="btn-ubah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/produk/{{$produk->id}}/edit" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="nama" class="col-form-label">Nama :</label>
                                                <input type="text" class="form-control" value="{{ old('nama') ? old('nama') : Auth::user()->nama}}" placeholder="Nama" name="nama">
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="no_telp" class="col-form-label">Nomor Telephone :</label>
                                                <input type="text" class="form-control" value="{{ old('no_telp') ? old('no_telp') :$investor->no_telp}}" name="no_telp">
                                            </div> --}}

                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif


            </div>
        </div>
    </div>

@endsection
