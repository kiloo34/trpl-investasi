@section('tittle', 'Detail Pesanan')
@extends('view')
@include('navbar')
@section('content')
    {{-- {{dd($data)}} --}}
    {{-- @include('msg_succes') --}}
    <h1 class="mt-1 mb-3">Halaman Detail Pesanan</h1>
    @include('msg_succes')
    {{-- {{dd($data)}} --}}
    @foreach ($data as $d)
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{$d}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                {{-- <h3>{{ $d->produk->nama_produk }}</h3> --}}
                {{-- <p>{{ $d->produk->deskripsi }}</p> --}}
                <a class="btn btn-primary" href="#">View Project
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
        <br>
    @endforeach
@endsection
