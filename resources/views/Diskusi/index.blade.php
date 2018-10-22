@section('title', 'Produk')
@extends('view')
@include('navbar')
@section('content')
    <div class="container">
        <h2>Diskusi Produk </h2>
        <div class="row justify-content-center">
            {{-- {{ dd($diskusi) }} --}}

            @if (count($diskusi) >= 1)
                @foreach ($diskusi as $d)
                    <div class="col-md-8" style="padding : 10px">
                        <div class="card">
                            <div class="card-header">{{$d->judul}}</div>
                            <div class="card-body">
                                {{$d->body}}
                                <small> Ditambahkan pada {{$d->created_at}} by {{$d->user->nama}}</small>
                            </div>
                            {{-- <h4>  </h4> --}}

                            <br>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="col-md-8" style="padding : 10px">
                <div class="card">
                    <div class="card-header">Tambah Komentar</div>
                    <div class="card-body">
                        <form method="post" action="{{ 'diskusi.store' }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">judul Komentar: </label>
                                <input type="text" name="title" class="form-control" required/>
                            </div>
                            <div class="form-group">
                                <label class="label">Komentar: </label>
                                <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
