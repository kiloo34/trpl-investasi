<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>  - @yield('title') </title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<!-- Styles -->
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="asset('vendor/bootstrap/css/bootstrap.min.css')">
<link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">

<style media="screen">
.background-cover{
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    position: relative;
    background-image: url("{{asset('image/navbar/back (1).png')}}");
    background-color: #592d00;
}
</style>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-inverse" role="navigation" id="background-color-1">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('image/navbar/back (2).png')}}" alt="" style="height: 30px;margin-top: -6px;"> - @yield('title')
        </a>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">

            {{-- Login --}}

            <li class="dropdown">
            <a href="{{ route('login') }}" class="dropdown-toggle" data-toggle="dropdown"><b>{{ __('Login') }}</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>
                <form method="POST" action="{{ route('login') }}" style="width: max-content;">
                    @csrf

                    <div class="form-group row">
                    <label for="email" class="col-md-8 col-form-label text-lg-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-8">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group row">
                    <label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    </div>

                    <div class="form-group row">
                    <div class="col-md-8 offset-md-4">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        </div>
                    </div>
                    </div>

                    <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    </div>
                </form>
                </li>
            </ul>
            </li>

            {{-- register --}}

            <li class="dropdown">
            <a href="#" class="dropdown" data-toggle="dropdown"><b>Register</b> <span class="caret"></span></a>
            <ul id="login-dp" class="dropdown-menu">
                <li>

                {{-- button --}}

                <button id="button-peternak" type="button" class="btn btn-primary btn-block" >Peternak</button>
                <button id="button-investor" type="button" class="btn btn-primary btn-block">Investor</button>

                {{-- investor --}}

                    <form id="form-investor" method="POST" action="{{ route('investor.store') }}" style="width: max-content;">
                        <h3>Daftar Sebagai Investor</h3>
                        {{ csrf_field() }}

                        <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label for="nama" class="col-md-8 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <input name="nama" value="{{ old('nama') }}" type="text" class="form-control" placeholder="Nama" required>
                            @if($errors->has('nama')) <span class="help-block">{{ $errors->first('nama') }}</span> @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email" class="col-md-8 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control" placeholder="Ketik ulang password" required>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                            <label for="jenis_kelamin" class="col-lg-8 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option selected >Jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('no_telp') ? ' has-error' : '' }}">
                            <label for="no_telp" class="col-lg-8 col-form-label text-md-right">No Telephone</label>
                            <input id="no_telp" type="number" class="form-control" name="no_telp" value="{{ old('no_telp') }}" required autofocus>
                            @if ($errors->has('no_telp'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_telp') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

                    {{-- peternak --}}

                    <form id="form-peternak" method="POST" action="{{ route('peternak.store') }}" style="width: max-content;" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3>Daftar Sebagai Peternak</h3>
                    <div class="form-group has-feedback {{ $errors->has('nama') ? 'has-error' : '' }}">
                        <label for="nama" class="col-md-8 col-form-label text-md-right">{{ __('Nama') }}</label>
                        <input name="nama" value="{{ old('nama') }}" type="text" class="form-control" placeholder="Nama" required>
                        @if($errors->has('nama')) <span class="help-block">{{ $errors->first('nama') }}</span> @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-md-8 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="col-md-8 col-form-label text-md-right">{{ __('Password') }}</label>
                        <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password" class="form-control" placeholder="Ketik ulang password" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('alamat') ? 'has-error' : '' }}">
                        <label for="alamat" class="col-md-8 col-form-label text-md-right">{{ __('Alamat') }}</label>
                        <input name="alamat" value="{{ old('alamat') }}" type="text" class="form-control" placeholder="Alamat" required>
                        @if ($errors->has('alamat'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('provinsi') ? 'has-error' : '' }}">
                        <label for="provinsi" class="col-lg-8 col-form-label text-md-right">{{ __('provinsi') }}</label>
                        <input name="provinsi" value="{{ old('provinsi') }}" type="text" class="form-control" placeholder="Provinsi" required>
                        @if ($errors->has('provinsi'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('provinsi') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('kabupaten') ? 'has-error' : '' }}">
                        <label for="kabupaten" class="col-lg-8 col-form-label text-md-right">{{ __('Kabupaten') }}</label>
                        <input name="kabupaten" value="{{ old('kabupaten') }}" type="text" class="form-control" placeholder="Kabupaten" required>
                        @if ($errors->has('kabupaten'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kabupaten') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('kecamatan') ? 'has-error' : '' }}">
                        <label for="kecamatan" class="col-lg-8 col-form-label text-md-right">{{ __('Kecamatan') }}</label>
                        <input name="kecamatan" value="{{ old('kecamatan') }}" type="text" class="form-control" placeholder="Kecamatan" required>
                        @if ($errors->has('kecamatan'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kecamatan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('kelurahan') ? 'has-error' : '' }}">
                        <label for="kelurahan" class="col-lg-8 col-form-label text-md-right">{{ __('Kelurahan') }}</label>
                        <input name="kelurahan" value="{{ old('kelurahan') }}" type="text" class="form-control" placeholder="Kelurahan" required>
                        @if ($errors->has('kelurahan'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('kelurahan') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('foto_kandang') ? 'has-error' : '' }}">
                        <label for="foto_kandang" class="col-lg-8 col-form-label text-md-right">{{ __('Foto Kandang') }}</label>
                        <input name="foto_kandang" value="{{ old('foto_kandang') }}" type="file" class="form-control" placeholder="Foto Kandang" required>
                        @if ($errors->has('foto_kandang'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('foto_kandang') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('foto_ktp') ? 'has-error' : '' }}">
                        <label for="foto_ktp" class="col-lg-8 col-form-label text-md-right">{{ __('Foto KTP') }}</label>
                        <input name="foto_ktp" value="{{ old('foto_ktp') }}" type="file" class="form-control" placeholder="Foto KTP" required>
                        @if($errors->has('foto_ktp')) <span class="help-block">{{ $errors->first('foto_ktp') }}</span> @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('foto_profil') ? 'has-error' : '' }}">
                        <label for="foto_profil" class="col-lg-8 col-form-label text-md-right">{{ __('Foto Profil') }}</label>
                        <input name="foto_profil" value="{{ old('jenis_kelamin') }}" type="file" class="form-control" placeholder="Foto Profil" required>
                        @if($errors->has('foto_profil')) <span class="help-block">{{ $errors->first('foto_profil') }}</span> @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                        <label for="jenis_kelamin" class="col-lg-8 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>
                        <select class="form-control" name="jenis_kelamin" required>
                        <option selected >Jenis Kelamin</option required>
                        <option value="Perempuan">Perempuan</option required>
                        <option value="Laki-Laki">Laki-Laki</option required>
                        </select>
                        @if($errors->has('jenis_kelamin')) <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span> @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('no_ktp') ? 'has-error' : '' }}">
                        <label for="no_ktp" class="col-lg-8 col-form-label text-md-right">{{ __('No KTP') }}</label>
                        <input name="no_ktp" value="{{ old('no_ktp') }}" type="text" class="form-control" placeholder="No KTP" required>
                        @if($errors->has('no_ktp')) <span class="help-block">{{ $errors->first('no_ktp') }}</span> @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('no_telp') ? 'has-error' : '' }}">
                        <label for="no_telp" class="col-lg-8 col-form-label text-md-right">{{ __('No telphone') }}</label>
                        <input name="no_telp" value="{{ old('no_telp') }}" type="text" class="form-control" placeholder="No Telp" required>
                        @if($errors->has('no_telp')) <span class="help-block">{{ $errors->first('no_telp') }}</span> @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('tgl_lahir') ? 'has-error' : '' }}">
                        <label for="tgl_lahir" class="col-lg-8 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>
                        <input name="tgl_lahir" value="{{ old('tgl_lahir') }}" type="date" class="form-control" placeholder="Tanggal Lahir" required>
                        @if($errors->has('tgl_lahir')) <span class="help-block">{{ $errors->first('tgl_lahir') }}</span> @endif
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                    </form>
                </li>
                </ul>
            </li>
            </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    </div>

    <div class="background-cover">

    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    @include('footer')

<script type="text/javascript">
    $(document).ready(function() {
        $('#form-investor').hide();
        $('#form-peternak').hide();
        $('#button-peternak').on('click', function(e) {
        e.preventDefault();
        $('#form-peternak').show();
        $('#form-investor').hide();
        $('#button-peternak').hide();
        $('#button-investor').show();
        });
        $('#button-investor').on('click', function(e) {
        e.preventDefault();
        $('#form-investor').show();
        $('#form-peternak').hide();
        $('#button-investor').hide();
        $('#button-peternak').show();
        })
    })
</script>
</body>
</html>
