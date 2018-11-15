@extends('view-admin')

@section('title', 'Daftar Pesanan')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>kuantitas</th>
                    <th>Total</th>
                    <th>Status</th>
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
                        <td> {{ $d->status }} </td>
                        <td>
                            @if ($d->status == 'Menunggu Pembayaran')

                                {{-- {{ route('peternak.verifikasi', $p->user->id) }} --}}
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-money" aria-hidden="true"></i> Pembayaran</a>
                            @endif
                            @if ($d->status == 'Proses Verifikasi')
                                <a href="" class="btn btn-flat btn-primary btn-sm"><i class="fa fa-check" aria-hidden="true"></i> Verifikasi</a>
                            @endif
                            <a href="{{route ('produk.destroy', $d->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Periode</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
