@extends('view-admin')
@section('title', 'Daftar Investor')
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investor as $i)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $i->user->nama }} </td>
                        <td> {{ $i->jenis_kelamin }} </td>
                        <td> {{ $i->no_telp }} </td>
                        <td>
                            @if ($i->user->status == 'belum aktif')
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#btn-detail" data-whatever="@fat"> <i class="fa fa-pencil fa-fw"></i> Verifikasi</button>
                            @endif
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail-{{$i->id}}" data-whatever="@fat"> <i class="fa fa-search"></i> Detail</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>

    @foreach ($investor as $i)
        <div class="modal fade" id="btn-detail-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
                                <input class="form-control" id="recipient-name" value="{{ $i->user->nama }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">No Identitas : </label>
                                <input class="form-control" id="message-text" value="{{ $i->no_ktp }}"readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Jenis Kelamin : </label>
                                <input class="form-control" id="recipient-name" value="{{ $i->jenis_kelamin }}"readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Nomor Telepon : </label>
                                <input class="form-control" id="message-text" value="{{ $i->no_telp }}"readonly></input>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Email : </label>
                                <input class="form-control" id="message-text" value="{{ $i->user->email }}"readonly></input>
                            </div>
                        </form>
                        <button type="button" class="btn btn-default" style="float: right" data-dismiss="modal">tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
