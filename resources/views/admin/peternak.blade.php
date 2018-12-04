@extends('view-admin')
@section('title', 'Daftar Peternak')
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peternak as $p)
                {{-- {{dd($p->user->nama)}} --}}
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $p->user->nama }} </td>
                        <td> {{ $p->alamat }} </td>
                        <td> {{ $p->kabupaten }} </td>
                        <td> {{ $p->kecamatan }} </td>
                        <td> {{ $p->kelurahan }} </td>
                        <td> {{ $p->jenis_kelamin }} </td>
                        <td> {{ $p->no_telp }} </td>
                        <td>
                            @if($p->user->status == 'aktif')
                                <span class="badge badge-pill badge-success">
                                    {{ $p->user->status }}
                                </span>
                            @else
                                <span class="badge badge-pill badge-warning">
                                    {{ $p->user->status }}
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($p->user->status == 'belum aktif')
                                <a href="{{ route('peternak.verifikasi', $p->user->id) }}" class="btn btn-flat btn-primary btn-sm">Verifikasi</a>
                            @endif
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail-{{$p->id}}" data-whatever="@fat"> <i class="fa fa-search"></i> Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kabupaten</th>
                    <th>Kecamatan</th>
                    <th>Kelurahan</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    @foreach ($peternak as $p)
        <div class="modal fade" id="btn-detail-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama : </label>
                                <input class="form-control" id="recipient-name" value="{{ $p->user->nama }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">No Identitas : </label>
                                <input class="form-control" id="message-text" value="{{ $p->no_ktp }}"readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jenis Kelamin : </label>
                                <input class="form-control" id="recipient-name" value="{{ $p->jenis_kelamin }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nomor Telepon : </label>
                                <input class="form-control" id="message-text" value="{{ $p->no_telp }}"readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Email : </label>
                                <input class="form-control" id="message-text" value="{{ $p->user->email }}"readonly></input>
                            </div>
                        </form>
                        <button type="button" class="btn btn-default" style="float: right" data-dismiss="modal">tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
