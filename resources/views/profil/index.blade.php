<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Ngoter - @yield('tittle')</title>

    <link rel="shortcut icon" href="{{ asset('image/navbar/back (2).png') }}">

</head>
<body>
    <div class="container">
        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Halaman Profil</h1>

        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.html">Home</a>
          </li>
          <li class="breadcrumb-item active">Profil</li>
        </ol>

        <!-- Content Row -->
        <div class="row">
          <!-- Sidebar Column -->
          <div class="col-lg-3 col-md-6 col-sm-3">
            <div class="list-group">
              <a href="/profil" class="list-group-item">Profil</a>
              <a href="#" class="list-group-item">My Investment</a>
            </div>
          </div>
          <!-- Content Column -->

          <div class="col-lg-9 col-md-6 col-sm-3 ">
            <form>
              @if (Auth::check())
                @if (Auth::user()->role=='investor')
                  <div class="form-group row">
                    <label for="nama" class="col-lg-3 col-form-label">Nama</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="nama" class="form-control-plaintext" id="mod-inputan" value="{{ old('nama') ? old('nama') : Auth::user()->nama}}" placeholder="Nama">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="jenis_kelamin" class="col-lg-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" class="form-control-plaintext" id="nama" value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $investor->jenis_kelamin}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="no_telp" class="col-lg-3 col-form-label">Nomor Telephone</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" class="form-control-plaintext" id="nama" value="{{ old('no_telp') ? old('no_telp') : $investor->no_telp}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('email') ? old('email') : Auth::user()->email}}">
                    </div>
                  </div>
                @endif
              @endif

              @if (Auth::check())
                @if (Auth::user()->role=='peternak')
                  <div class="form-group row">
                    <label for="foto_profil" class="col-lg-3 col-form-label"></label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      {{-- <input type="judul" readonly name="foto_profil" class="form-control-plaintext" id="staticEmail" value="{{ old('foto_profil') ? old('foto_profil') : $peternak->foto_ktp}}" placeholder="foto_ktp"> --}}
                      <img src="{{ old('foto_profil') ? old('foto_profil') : $peternak->foto_ktp}}" alt="..." class="img-rounded">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama" class="col-lg-3 col-form-label">Nama</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="nama" class="form-control-plaintext" id="mod-inputan" value="{{ old('nama') ? old('nama') : Auth::user()->nama}}" placeholder="Nama">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-lg-3 col-form-label">Alamat</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="nama" class="form-control-plaintext" id="mod-inputan" value="{{ old('alamat') ? old('alamat') : $peternak->alamat}}" placeholder="alamat">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="provinsi" class="col-lg-3 col-form-label">Provinsi</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="provinsi" class="form-control-plaintext" id="mod-inputan" value="{{ old('provinsi') ? old('provinsi') : $peternak->provinsi}}" placeholder="provinsi">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kabupaten" class="col-lg-3 col-form-label">Kabupaten</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="kabupaten" class="form-control-plaintext" id="mod-inputan" value="{{ old('kabupaten') ? old('kabupaten') : $peternak->kabupaten}}" placeholder="kabupaten">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kecamatan" class="col-lg-3 col-form-label">Kecamatan</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="kecamatan" class="form-control-plaintext" id="mod-inputan" value="{{ old('kecamatan') ? old('kecamatan') : $peternak->kecamatan}}" placeholder="kecamatan">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kelurahan" class="col-lg-3 col-form-label">Kelurahan</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" name="kelurahan" class="form-control-plaintext" id="mod-inputan" value="{{ old('kelurahan') ? old('kelurahan') : $peternak->kelurahan}}" placeholder="kelurahan">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="foto_kandang" class="col-lg-3 col-form-label">Foto Kandang</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly name="foto_kandang" class="form-control-plaintext" id="staticEmail" value="{{ old('foto_kandang') ? old('foto_kandang') : $peternak->foto_kandang}}" placeholder="foto_kandang">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="foto_ktp" class="col-lg-3 col-form-label">Foto KTP</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly name="foto_ktp" class="form-control-plaintext" id="staticEmail" value="{{ old('foto_ktp') ? old('foto_ktp') : $peternak->foto_ktp}}" placeholder="foto_ktp">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="no_ktp" class="col-lg-3 col-form-label">Nomor KTP</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('no_ktp') ? old('no_telp') : $peternak->no_ktp}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="jenis_kelamin" class="col-lg-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $peternak->jenis_kelamin}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="no_telp" class="col-lg-3 col-form-label">Nomor Telephone</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('no_telp') ? old('no_telp') : $peternak->no_telp}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tgl_lahir" class="col-lg-3 col-form-label">Tanggal Lahir</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('tgl_lahir') ? old('tgl_lahir') : $peternak->tgl_lahir}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="email" class="col-lg-3 col-form-label">Email</label>
                    <div class="col-lg-9 col-md-6 col-sm-3">
                      <input type="judul" readonly class="form-control-plaintext" id="staticEmail" value="{{ old('email') ? old('email') : Auth::user()->email}}">
                    </div>
                  </div>
                @endif
              @endif
            </form>

              {{-- modal edit   --}}

              @if (Auth::check())
                @if (Auth::user()->role=="investor")
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#investor" id="btn-investor">Edit Investor</button>
                <hr>
              @elseif (Auth::user()->role=="peternak")
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#peternak" id="btn-peternak">Edit Peternak</button>
                <hr>
                @endif
              @endif

              {{-- Investor --}}

              @if (Auth::check())
                @if (Auth::user()->role=="investor")
                  <div class="modal fade bd-example-modal-lg" id="investor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                              <form action="/investor/{{Auth::user()->id}}/edit" method="post">
                                  {{ csrf_field() }}
                                  <div class="form-group">
                                  <label for="nama" class="col-form-label">Nama :</label>
                                  <input type="text" class="form-control" id="recipient-name" value="{{ old('nama') ? old('nama') : Auth::user()->nama}}" placeholder="Nama" name="nama">
                                  </div>
                                      <div class="form-group">
                                          <label for="jenis_kelamin" class="col-form-label">Jenis Kelamin :</label>
                                          <select class="form-control" name="jenis_kelamin">
                                              <option selected placeholder="Jenis Kelamin">{{ old('jenis_kelamin') ? old('jenis_kelamin') : $investor->jenis_kelamin}}</option>
                                              <option value="Perempuan">Perempuan</option>
                                              <option value="Laki-Laki">Laki-Laki</option>
                                          </select>
                                      </div>
                                  <div class="form-group">
                                      <label for="no_telp" class="col-form-label">Nomor Telephone :</label>
                                      <input type="text" class="form-control" id="recipient-name" value="{{ old('no_telp') ? old('no_telp') :$investor->no_telp}}" name="no_telp">
                                  </div>

                                  <input type="hidden" name="_method" value="PUT">
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              @endif

              {{-- Peternak --}}

              @if (Auth::check())
                @if (Auth::user()->role=='peternak')
                  <div class="modal fade bd-example-modal-lg" id="peternak" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit Profil</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="container-fluid">
                            <form action="/peternak/{{Auth::user()->id}}/edit" method="post">
                              {{csrf_field()}}
                              <div class="form-group">
                                <label for="nama" class="col-md-3 col-form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama') ? old('nama') : Auth::user()->nama}}">
                              </div>

                              <div class="form-group">
                                <label for="alamat" class="col-md-3 col-form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" value="{{ old('alamat') ? old('alamat') : $peternak->alamat}}">
                              </div>

                              <div class="form-group">
                                <label for="provinsi" class="col-md-3 col-form-label">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" value="{{ old('provinsi') ? old('provinsi') : $peternak->provinsi}}">
                              </div>

                              <div class="form-group">
                                <label for="kabupaten" class="col-md-3 col-form-label">Kabupaten</label>
                                <input type="text" class="form-control" id="kabupaten" value="{{ old('kabupaten') ? old('kabupaten') : $peternak->kabupaten}}">
                              </div>

                              <div class="form-group">
                                <label for="kecamatan" class="col-md-3 col-form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" value="{{ old('kecamatan') ? old('kecamatan') : $peternak->kecamatan}}">
                              </div>

                              <div class="form-group">
                                <label for="kelurahan" class="col-md-3 col-form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" value="{{ old('kelurahan') ? old('kelurahan') : $peternak->kelurahan}}">
                              </div>

                              <div class="form-group">
                                <label for="foto_kandang" class="col-md-3 col-form-label">Foto Kandang</label>
                                <input type="text" class="form-control" id="foto_kandang" value="{{ old('foto_kandang') ? old('foto_kandang') : $peternak->foto_kandang}}">
                              </div>

                              <div class="form-group">
                                <label for="foto_ktp" class="col-md-3 col-form-label">Foto KTP</label>
                                <input type="text" class="form-control" id="foto_ktp" value="{{ old('foto_ktp') ? old('foto_ktp') : $peternak->foto_ktp}}">
                              </div>

                              <div class="form-group">
                                <label for="foto_profil" class="col-md-3 col-form-label">Foto Profil</label>
                                <input type="text" class="form-control" id="foto_profil" value="{{ old('foto_profil') ? old('foto_profil') : $peternak->foto_profil}}">
                              </div>

                              <div class="form-group">
                                <label for="jenis_kelamin" class="col-md-3 col-form-label">Jenis Kelamin</label>
                                  <select class="form-control" name="jenis_kelamin">
                                      <option selected >{{ old('jenis_kelamin') ? old('jenis_kelamin') : $peternak->jenis_kelamin}}</option>
                                      <option value="Perempuan">Perempuan</option>
                                      <option value="Laki-Laki">Laki-Laki</option>
                                  </select>
                              </div>

                              <div class="form-group">
                                <label for="no_ktp" class="col-md-3 col-form-label">Nomor KTP</label>
                                  <input type="text" class="form-control" id="no_ktp" value="{{ old('no_ktp') ? old('no_ktp') : $peternak->no_ktp}}">
                              </div>

                              <div class="form-group">
                                <label for="no_telp" class="col-md-3 col-form-label">Nomor Telephone</label>
                                  <input type="text" class="form-control" id="no_telp" value="{{ old('no_telp') ? old('no_telp') : $peternak->no_telp}}">
                              </div>

                              <div class="form-group">
                                <label for="tgl_lahir" class="col-md-3 col-form-label">Tanggal Lahir</label>
                                  <input type="date" class="form-control" id="tgl_lahir" value="{{ old('tgl_lahir') ? old('tgl_lahir') : $peternak->tgl_lahir}}">
                              </div>

                              <input type="hidden" name="_method" value="PUT">
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                @endif
              @endif
          </div>
        </div>
      </div>
</body>
</html>

@include('footer')
