@extends('view')
@include('navbar')
@section('title', 'Proyeksi')

@section('content')
    @foreach ($data as $d)
        <h1 class="mt-1 mb-3">Progres Produk Investasi .{{$d->}}<br>
            <small>Menampilkan Semua data Pesanan</small>
        </h1>
    @endforeach
    @include('msg_succes')
    {{-- @foreach ($data as $d) --}}
        <div class="row">
            <div class="col-md-6">
                <a href="#">
                    {{-- <img class="img-fluid rounded mb-3 mb-md-0" src="{{$d->produk->foto_produk}}" alt=""> --}}
                </a>
            </div>
            <div class="col-md-6">
                {{-- <h3>{{ $d->produk->nama_produk }}</h3>
                <p>{{ $d->produk->deskripsi }}</p> --}}
                {{-- <small> {{ $d->status }} </small><br> --}}
                {{-- <small> Metode Pembayaran : {{ $d->pembayaran->pembayaran }} </small> --}}
                {{-- @if ($d->pembayaran->pembayaran == 'transfer')
                    @if ($d->status == "Menunggu Pembayaran")
                        <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#upload-{{$d->id}}"> Upload Bukti Pembayaran </button>
                    @endif
                @endif
                @if ($d->status == "Berjalan")
                    <button type="button" class="btn btn-primary" style="float: right"> Lihat Progres </button>
                @endif --}}
            </div>
        </div>
        <br>
    {{-- @endforeach --}}

@endsection
