@section('title', 'Produk')
@extends('view')
@include('navbar')
@section('content')
        <div>
            <h2>Diskusi Produk </h2>
        </div>

        <div class="row justify-content-center">
            {{-- {{ dd($diskusi) }} --}}

            @if (count($diskusi) >= 1)
                @foreach ($diskusi as $d)
                    <div class="col-md-8" style="padding : 10px">
                        <div class="card">
                            <div class="card-header">{{$d->judul}}</div>
                            <div class="card-body">
                                {{$d->body}}
                            </div>
                            {{-- <h4>  </h4> --}}
                            <div class="card-footer text-muted">
                                <small>Ditambahkan pada {{$d->created_at}} dibuat oleh {{$d->user->nama}} <a href="{{route('diskusi.balas_index', $d->id)}}" style="float: right;">Balas Diskusi <i class="fa fa-angle-right" aria-hidden="true"></i></a></small>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-8" style="padding : 10px">
                    <div class="card">
                        <div class="card-header">Belum ada Komentar</div>
                    </div>
                </div>
            @endif
            <div class="col-md-8" style="padding : 10px">
                <div class="card">
                    <div class="card-header">Tambah Komentar</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('diskusi.store', [$id_produk]) }}">
                            <div class="form-group">
                                @csrf
                                <label class="label">judul Komentar: </label>
                                <input type="text" name="judul" class="form-control" required/>
                            </div>
                            @foreach ($diskusi as $d)
                                @if (Auth::user()->id != $d->produk->peternak->user->id) {{--login--}}
                                    <input type="hidden" name="id_user" value="{{$d->produk->peternak->user->id}}">
                                @else
                                    {{-- {{dd($d->diskusi->user->id)}} --}}
                                    {{-- <input type="hidden" name="id_user" value="{{$d->diskusi->user->id}}"> --}}
                                @endif
                            @endforeach
                            <div class="form-group">
                                <label class="label">Komentar: </label>
                                <textarea name="body" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success">
                                {{-- <a type="submit" class="btn btn-success" href="{{route('diskusi.store')}}"> Submit </a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
