@extends('view-admin')
@section('title', 'Daftar Kontrak')
@section('content')

    @include('msg_succes')

    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Tambah Kontrak </button>

            <div class="accordion mt-5" id="kontrak" >
                @foreach ($kontrak as $k)
                    <div class="card">
                        <div class="card-header" id="judul">
                            <h5 class="mb-0">
                                <button class="badge badge-secondary" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ $k->kategori }}
                                </button>
                            </h5>
                        </div>
                    
                        <div id="collapseOne" class="collapse show" aria-labelledby="judul" data-parent="#kontrak">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $k->profilResiko }}</li>
                                    <li class="list-group-item">Dapibus ac facilisisp in</li>
                                    <li class="list-group-item">Morbi leo risus</li>
                                    <li class="list-group-item">Porta ac consectetur ac</li>
                                    <li class="list-group-item">Vestibulum at eros</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Kontrak</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="kategori">Kategori</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option selected> Kategori </option>
                                            <option value="Sapi">Sapi</option>
                                            <option value="Kambing">Kambing</option>
                                            <option value="Ayam">Ayam</option>
                                            <option value="Kambing Etawa">Kambing Etawa</option>
                                            <option value="Ayam Petelur">Ayam Petelur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Profil Resiko</label>
                                    <div class="col-sm-8">
                                        <textarea name="profilResiko" class="col-sm-12" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label"> Rencana Pengelolaan </label>
                                    <div class="col-sm-8">
                                        <textarea name="rencanaPengelolaan" class="col-sm-12" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Struktur</label>
                                    <div class="col-sm-8">
                                        <textarea name="struktur" class="col-sm-12" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-4 col-form-label">Term</label>
                                    <div class="col-sm-8">
                                        <textarea name="term" class="col-sm-12" rows="5"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <input type="submit" class="btn btn-primary" style="float: right;" value="Tambah">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection