@extends('view')
@include('navbar')
@section('title', 'Proyeksi')

@section('content')


    @if (Auth::user()->role == 'investor')
        <h1 class="mt-1 mb-3">Progres Produk Investasi .{{$data->nama_produk}}<br>
            <small>Menampilkan Semua data Pesanan</small>
        </h1>

        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{$data->foto_produk}}" alt="">
                </a>
            </div>
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Aktifitas</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($progres as $p)
                            <tr>
                                {{-- {{dd($p->foto)}} --}}
                                <th><img src="{{ asset('storage/$p->foto') }}" class="img-responsive rounded float-left" alt="" width="40" height="50"></th>
                                <th>{{ $p->aktifitas }}</th>
                                <th>{{ $p->deskripsi }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    @else
        <h1 class="mt-1 mb-3">Progres Produk Investasi {{$data->nama_produk}}<br>
            <small>Menampilkan Semua data Pesanan</small>
        </h1>

        @include('msg_succes')

        <div class="row">
            <div class="col-md-12">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{$data->foto_produk}}" alt="">
                </a>
            </div>
        </div>
        <br>
        {{-- {{dd($data->id)}} --}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Progres Investasi</h5><br>
                        <form action="{{route('peternak.progres', $data->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="file" class="form-control-file border" name="foto" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control-plaintext" placeholder="Aktifitas yang dilakukan" name="aktifitas" required>
                            </div>
                            <div class="form-group">
                                <textarea name="deskripsi" class="form-control-plaintext" placeholder="Deskripsi Aktivitas" cols="30" rows="10" required></textarea>
                                {{-- <input type="text" class="form-control-plaintext" placeholder="Deskripsi Aktivitas" name="deskripsi" required> --}}
                            </div>
                            <input type="hidden" name="id_user" value="{{$data->id_user}}">
                            <input type="submit" class="btn btn-light" style="float: right">
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-6">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Aktifitas</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    {{-- {{dd($data)}} --}}
                    <tbody>
                        @foreach ($progres as $p)
                            {{-- {{dd($p->deskripsi)}} --}}
                            <tr>
                                <th><img src="{{ $p->foto }}" class="img-responsive rounded float-left" alt="" width="40" height="50"></th>
                                <th>{{ $p->aktifitas }}</th>
                                <th>{{ $p->deskripsi }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    @endif

@endsection
