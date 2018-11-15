@extends('view')
@include('navbar')
@section('title', 'Saldo')
@section('content')
<div class="container">
    <h2 class="mt-4 mb-3">Halaman Saldo</h2>
    <div class="row mt-4 mb-3">
        <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-money fa-5x" aria-hidden="true"></i>
                    </div>
                        <div class="mr-5" style="float: left">Saldo anda Rp. {{$saldo->saldo}},-</div>
                </div>
                    <a class="card-footer text-white clearfix small z-1" href="/peternak">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                        </span>
                    </a>
            </div>
        </div>

        <div class="col-xl-6 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-address-card fa-4x" aria-hidden="true"></i>
                    </div>
                    <div class="mr-5">Penarikan</div>
                </div>
                <a id="tarik" class="card-footer text-white clearfix small z-1">
                    <span class="float-left">Klik Disini</span>
                    <span class="float-right">
                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>

    <div class="row" id="form-tarik">
        <div class="col-xl-12 col-sm-6 mb-3">
            <div class="card bg-white">
                <form action="{{route('saldo.store')}}" method="post" >
                    {{ csrf_field() }}
                    <div class="card-header">
                        <h5>Form - Permintaan Pencairan</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-row" >
                            <div class="col-md-6 mb-3 has-feedback {{$errors->has('nominal') ? 'has_error' : ''}}">
                                <label for="validationCustom03">Nominal</label>
                                <input name="nominal" type="number" class="form-control" placeholder="0" required>
                                <input name="saldo" type="hidden" class="form-control" value="{{$saldo->id}}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom03">Pilih Akun Bank</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_akunBank" required>
                                    @foreach ($akunBank as $ab)
                                        <option value="{{$ab->id}}">{{$ab->id}} - {{$ab->bank->nama_bank}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button href="{{route('saldo.create')}}" class="btn btn-success" type="submit">
                            <i class="fa fa-check" aria-hidden="true">Submit form</i>
                        </button>
                        <button class="btn btn-danger" id="batal">
                            <i class="fa fa-times" aria-hidden="true"> Batal</i>
                        </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-sm-12 mb-12">
            <h2>
                <i class="fa fa-history" aria-hidden="true">Riwayat Saldo</i>
            </h2>
            @if (count($saldo->mutasi) < 1)
                <div class="alert alert-danger" role="alert">
                    anda Belum Melakukan Transaksi
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                        {{-- <th>Saldo Awal (Rp.)</th>
                             --}}
                        <th>Perubahan (Rp.)</th>
                        {{-- <th>Saldo Akhir (Rp.)</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>
                            <span class="label label-success">
                                {{ $d->keterangan }}
                            </span>
                        </th>
                        <th>{{ $d->created_at }}</th>
                        {{-- <th>{{ $d->sAwal }}</th> --}}
                        {{-- {{dd($d->mutasi)}} --}}
                        <th>{{ $d->nominal }}</th>
                        {{-- <th>{{ $d->sAkhir }}</th> --}}
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Keterangan</th>
                        <th>Waktu</th>
                        {{-- <th>Saldo Awal (Rp.)</th> --}}
                        <th>Perubahan (Rp.)</th>
                        {{-- <th>Saldo Akhir (Rp.)</th> --}}
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#form-tarik').hide();

        $('#tarik').on('click', function(e) {
            e.preventDefault();
            $('#form-tarik').show();
        });

        $('#batal').on('click', function (e) {
            e.preventDefault();
            $('#form-tarik').hide();
        })
    })
</script>

@endsection

@push('script')

@endpush

