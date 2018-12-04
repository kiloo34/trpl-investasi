@extends('view-admin')
@section('title', 'Daftar Produk')
@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Periode</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td> {{ $p->nama_produk }} </td>
                        <td> {{ $p->harga }} </td>
                        <td> {{ $p->periode }} </td>
                        <td> {{ $p->stock }} </td>
                        <td>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btn-detail-{{$p->id}}" data-whatever="@fat"> <i class="fa fa-search"></i> Detail</button>
                            <a href="{{route ('produk.destroy', $p->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
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

    @foreach ($produk as $p)
        <div class="modal fade" id="btn-detail-{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Foto Produk</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <img src="{{ $p->foto_produk }}" class="img-responsive" alt="Cinque Terre" width="304" height="236">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Nama Produk</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('nama_produk') ? old('nama_produk') : $p->nama_produk}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Harga</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('harga') ? old('harga') : $p->harga}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Periode</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('periode') ? old('periode') : $p->periode}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Stock</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('stock') ? old('stock') : $p->stock}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Profil Resiko</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('profilResiko') ? old('profilResiko') : $p->kontrak->profilResiko}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Rencana Pengelolaan</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('rencanaPengelolaan') ? old('rencanaPengelolaan') : $p->kontrak->rencanaPengelolaan}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Struktur</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('struktur') ? old('struktur') : $p->kontrak->struktur}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-3 col-form-label">Term</label>
                            <div class="col-lg-9 col-md-6 col-sm-3">
                                <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('term') ? old('term') : $p->kontrak->term}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
            </div>
        </div>
@endsection
