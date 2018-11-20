@section('tittle', 'Riwayat Pesanan')
@extends('view')
@include('navbar')
@section('content')
    {{-- {{dd($data)}} --}}
    {{-- @include('msg_succes') --}}
    <h1 class="mt-1 mb-3">Daftar Pesanan <br>
        <small>Menampilkan Semua data Pesanan</small>
    </h1>
    @include('msg_succes')
    @foreach ($data as $d)
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="{{$d->produk->foto_produk}}" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{ $d->produk->nama_produk }}</h3>
                <p>{{ $d->produk->deskripsi }}</p>
                <small> {{ $d->status }} </small><br>
                <small> Metode Pembayaran : {{ $d->pembayaran->pembayaran }} </small>
                @if ($d->pembayaran->pembayaran == 'transfer')
                    @if ($d->status == "Menunggu Pembayaran")
                        <button type="button" class="btn btn-primary" style="float: right" data-toggle="modal" data-target="#upload-{{$d->id}}"> Upload Bukti Pembayaran </button>
                    @endif
                @endif
                @if ($d->status == "Berjalan")
                    <a href="{{ route('produk.pantau', $d->id) }}"" class="btn btn-primary" style="float: right">Lihat Progres</a>
                    {{-- <button type="button" class="btn btn-primary" style="float: right"> Lihat Progres </button> --}}
                @endif
            </div>
        </div>
        <br>
    @endforeach

    @foreach ($data as $d)
        <div class="modal fade" id="upload-{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail {{$d->produk->nama_produk}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('bukti.pembayaran', $d->pembayaran->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Bukti Pembayaran:</label>
                                <input type="file" name="bukti" class="form-control" id="recipient-name">
                            </div>
                            <input type="hidden" name="id_pembayaran" value="{{$d->pembayaran->id}}">
                            <input type="submit" class="btn btn-success" style="float: right">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
