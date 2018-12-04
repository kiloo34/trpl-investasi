@extends('view-admin')
@section('title', 'Akun Bank')

<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 40%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 16px;
    }
</style>

@section('content')
    <h2>Daftar Bank</h2>
    <div class="row">
        <div class="col-xl-12">
            @if (count($bank) > 0)
                @foreach ($bank as $b)
                    <div class="col-xl-3" style="float: left">
                        <div class="card-header">Bank ke - {{$loop->iteration}}</div>
                        <div class="card-body">
                            <div class="container">
                                <h4><b>{{ $b->nama_bank }}</b></h4>
                                <h5>kode bank : {{ $b->id }}</h5>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            @else
                <h3>Maaf Tidak Ada Akun Perusahaan sekarang</h3>
            @endif
        </div>
    </div>
    {{-- <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Bank</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bank as $b)
                <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $b->nama_bank }} </td>
                    <td>
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail" data-whatever="@fat"> <i class="fa fa-search"></i> Detail</button>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#btn-detail" data-whatever="@fat"> <i class="fa fa-pencil fa-fw"></i> Verifikasi</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div> --}}

    <hr>

    <div class="row">
        <div class="col-xl-6 col-md-12">
            <h5 class="card-header col-xl-12 col-md-12">Tambah Bank</h5>
            <div class="card-body">
                <form action="" method="post">
                    {{ csrf_field() }}

                    <div class="form-group has-feedback {{ $errors->has('nama_bank') ? 'has_error' : '' }}">
                        <label for="nama_bank" class="control-label">{{__('Nama Bank')}}:</label>
                        <span>
                            <input name="nama_bank" class="form-control" type="text" required>
                        </span>
                    </div>
                    <button type="submit"class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw"></i>Tambah Bank</button>
                </form>
            </div>
        </div>

        <div class="col-xl-6 col-md-12">
            <h5 class="card-header col-xl-12 col-md-12">Tambah Akun Bank</h5>
            <div class="card-body">
                <form action="{{route('bank.akun')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Nama Bank (select one):</label>
                        <select name="nama" class="form-control" id="exampleFormControlSelect1">
                            @foreach ($bank as $b)
                                <option>{{$b->nama_bank}}</option>
                            @endforeach
                        </select>
                        @foreach ($bank as $b)
                            <input type="hidden" name="id_bank" value="{{$b->id}}">
                        @endforeach
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
                    {{-- <a href="{{route('bank.akun')}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw"></i>Tambah Akun Bank</a> --}}
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil fa-fw"></i>Tambah Akun Bank</button>
                </form>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xl-12">
            <h3>Akun Perusahaan</h3>
            @if (count($data) > 0)
                @foreach ($data as $d)
                    @if (Auth::user()->role == 'admin')
                        <div class="col-xl-3" style="float: left">
                            <div class="card-header">Akun Bank ke - {{$loop->iteration}}</div>
                            <div class="card-body">
                                <div class="container">
                                    <h4><b>{{ $d->bank->nama_bank }}</b></h4>
                                    <h5>{{ $d->role }}</h5>
                                    <h5>{{ $d->no_rek }}</h5>
                                </div>
                            </div>
                            <br>
                        </div>
                    @else
                        <h3>Maaf Tidak Ada Akun Perusahaan sekarang</h3>
                    @endif
                @endforeach
            @else
                <h3>Maaf Tidak Ada Akun Perusahaan sekarang</h3>
            @endif
        </div>
    </div>

@endsection
