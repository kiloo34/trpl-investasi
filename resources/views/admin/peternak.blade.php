@extends('view-admin')
@section('title', 'Admin')
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
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $p->nama }} </td>
                        <td> {{ $p->alamat }} </td>
                        <td> {{ $p->kabupaten }} </td>
                        <td> {{ $p->kecamatan }} </td>
                        <td> {{ $p->kelurahan }} </td>
                        <td> {{ $p->jenis_kelamin }} </td>
                        <td> {{ $p->no_telp }} </td>
                        <td>
                            @if($p->user->status == 'aktif')
                                <span class="label label-success">
                                    {{ $p->user->status }}
                                </span>
                            @else
                                <span class="label label-warning">
                                    {{ $p->user->status }}
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($p->user->status == 'belum aktif')
                                <a href="peternak/verifikasi/{peternak}" class="btn btn-flat btn-primary btn-sm">Verifikasi</a>
                            @endif
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail" data-whatever="@fat"> <i class="fa fa-search"></i> Detail</button>
                            {{-- <a href="users/verifikasi/{peternak}" class="btn btn-flat btn-primary">Verifikasi</a> --}}
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

    <div class="modal fade" id="btn-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Nama:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">sdasdsa :</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                    </div>
                </div>
            </div>
        </div>

@endsection
