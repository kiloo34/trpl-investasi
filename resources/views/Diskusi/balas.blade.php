@section('title', 'Balas Diskusi')
@extends('view')
@include('navbar')
@section('content')
        <div style="padding-top: 75px;">
            <h2>Balas Diskusi </h2>
        </div>

        @include('msg_succes')

        <div class="row justify-content-center">
            @if (count($data) >= 1)
                <div class="col-md-10" style="padding : 10px">
                    <div class="card">
                        <div class="card-header">{{$balas->judul}}</div>
                        <div class="card-body">
                            {{$balas->body}}
                            @foreach ($data as $d)
                                <div class="row" style="float: right">
                                    <input type="text" value="{{$d->balas}}" class="form-control-plaintext" readonly><br>
                                    <small style="float: right">Ditambahkan pada {{$d->created_at}} dibuat oleh {{$d->user->nama}}</small>
                                    <hr style="display: inline-block; width: 100%;">
                                </div>
                            @endforeach
                        </div>
                        <div class="card-footer text-muted">
                            <small>Ditambahkan pada {{$d->diskusi->created_at}} dibuat oleh {{$d->diskusi->user->nama}}</small>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-8" style="padding : 10px">
                    <div class="card">
                        <div class="card-header">Belum ada Balasan</div>
                    </div>
                </div>
            @endif
            <div class="col-md-8" style="padding : 10px">
                <div class="card">
                    <div class="card-header">Tambah Balasan</div>
                    <div class="card-body">
                        <form method="post" action="{{route('diskusi.balas', [$id_diskusi])}}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="label">Balasan</label>
                                <textarea name="balas" rows="10" cols="30" class="form-control" required></textarea>
                            </div>
                            @if ($data->count() == 0)
                                {{-- {{dd(Auth::user()->id)}} --}}
                                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                            @else
                                @foreach ($data as $d)
                                    @if (Auth::user()->id != $d->diskusi->produk->peternak->user->id) {{--login--}}
                                        {{-- {{dd(Auth::user()->id != $d->diskusi->produk->peternak->user->id)}} --}}
                                        <input type="hidden" name="id_user" value="{{$d->diskusi->produk->peternak->user->id}}">
                                    @else
                                        {{-- {{dd($d->diskusi->user->id)}} --}}
                                        <input type="hidden" name="id_user" value="{{$d->diskusi->user->id}}">
                                    @endif
                                @endforeach
                            @endif
                            <div class="form-group">
                                <input type="submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
