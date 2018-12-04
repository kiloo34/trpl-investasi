@extends('view')
@include('navbar')
@section('title', 'Akun Bank')

@section('content')

    <div class="container mt-4 mb-3">
        <div class="row mt-4 mb-3 justify-content-center">
            <div class="col-xl-8 col-md-10">
                <div class="card">
                    <h5 class="card-header">Tambah Akun Bank</h5>
                    <div class="card-body">
                        <form action="{{route('bank.akun')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kode Bank (select one):</label>
                                <select name="id_bank" class="form-control" id="exampleFormControlSelect1">
                                    @foreach ($bank as $b)
                                        <option>{{$b->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('an') ? 'has_error' : '' }}">
                                <label for="an" class="control-label">{{__('Atas Nama')}}:</label>
                                <span>
                                    <input name="an" class="form-control" type="text" required>
                                </span>
                            </div>
                            <div class="form-group has-feedback {{ $errors->has('no_rek') ? 'has_error' : '' }}">
                                <label for="no_rek" class="control-label">{{__('No Rekening')}}:</label>
                                <span>
                                    <input name="no_rek" class="form-control" type="text" required>
                                </span>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw"></i>Tambah Akun Bank</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-2">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nama Bank</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bank as $b)
                            <tr>
                                <th>{{ $b->id }}</th>
                                <th>{{ $b->nama_bank }}</th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4 mb-3">
            <div class="col-xl-12">
                <h3 class="row mt-4 mb-3">Akun Bank</h3>
                @if (count($data) > 0)
                    @foreach ($data as $d)
                        @if (Auth::user()->role == 'investor')
                            <div class="col-xl-3" style="float: left">
                                <div class="card-header">Akun Bank ke - {{$loop->iteration}}</div>
                                <div class="card-body">
                                    <div class="container">
                                        <h4><b>{{ $d->bank->nama_bank }}</b></h4>
                                        <h5>{{ $d->an }}</h5>
                                        <h5>{{ $d->no_rek }}</h5>
                                    </div>
                                </div>
                                <br>
                            </div>
                        @else
                            <h3>Maaf Tidak Ada Akun Bank sekarang</h3>
                        @endif
                    @endforeach
                @else
                    <h3>Maaf Tidak Ada Akun Bank sekarang</h3>
                @endif
            </div>
        </div>
    </div>

@endsection

