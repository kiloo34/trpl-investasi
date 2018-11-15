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
                    <th>Jenis Kelamin</th>
                    <th>No Telpon</th>
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
