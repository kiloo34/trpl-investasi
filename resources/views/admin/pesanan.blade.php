@extends('view-admin')

@section('title', 'Daftar Pesanan')
@section('content')
    @include('msg_succes')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>kuantitas</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>FIle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{dd($data)}} --}}
                @foreach ($data as $d)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $d->produk->nama_produk }} </td>
                        <td> {{ $d->kuantitas }} </td>
                        <td> {{ $d->total }} </td>
                        <td>
                            @if ($d->status == 'Dibatalkan')
                                <span class="badge badge-pill badge-danger"> {{ $d->status }} </span>
                            @else
                                <span class="badge badge-pill badge-primary"> {{ $d->status }} </span>
                            @endif
                        </td>
                        <td>
                            @if ( $d->pembayaran->bukti == null )
                                <span class="badge badge-pill badge-danger">Tidak ada File</span>
                            @endif
                            <img src="{{ $d->pembayaran->bukti }}" class="img-responsive rounded float-left" alt="" width="40" height="50">
                        </td>
                        <td>
                            @if ($d->status == 'Menunggu Pembayaran')
                                <a href="{{ route('admin.verifikasiPembayaran', $d->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-money" aria-hidden="true"></i> Pembayaran</a>
                                <a href="{{ route('admin.batalPesanan', $d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-ban" aria-hidden="true"></i> Batalkan</a>
                            @endif
                            @if ($d->status == 'Dalam Proses')
                                <a href="{{ route('admin.lanjutkan', $d->id) }}" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Lanjutkan</a>
                            @endif
                            @if ($d->status == 'Berjalan')
                                <span class="badge badge-pill badge-primary"> Menunggu Pembayaran dari peternak </span>
                            @endif
                            {{-- <a href="{{route ('produk.destroy', $d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a> --}}
                            @if ($d->status == 'Menunggu Verifikasi Admin')
                                <a href="{{ route('admin.verifikasiPembayaranProg', $d->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-money" aria-hidden="true"></i> Verifikasi</a>
                                <a href="{{ route('admin.batalVerif', $d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-ban" aria-hidden="true"></i> Batalkan </a>
                            @endif
                            @if ($d->status == 'Dana diterukan ke investor')
                                <a href="{{ route('admin.selesai', $d->id) }}" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Selesai</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>kuantitas</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>FIle</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
