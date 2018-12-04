<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/modern-business.css')}}" rel="stylesheet">

</head>
<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{asset('image/navbar/back (2).png')}}" alt="" style="height: 30px;margin-top: -6px;">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('beranda')}}"> Beranda </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">Tentang</a>
                    </li>

                    @if (!Auth::check())
                    @if (Auth::check())
                    @if (Auth::user()->role=='peternak')

                    @endif
                    @endif
                    <li class="dropdown">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>

                    @elseif(Auth::user()->role=='investor')
                    <li class="nav-item">
                        <a class="nav-link" href="/investor/profil">Profil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/investor/pantau">Pantau</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/investor/produk">Produk</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifikasi') }}"> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifikasi <span class="badge badge-light">{{Auth::user()->notifikasi->where('seen', 0)->count()}}</span></a>
                    </li>

                    @elseif(Auth::user()->role=='peternak')
                    <li class="nav-item">
                        <a class="nav-link" href="/peternak/profil">Profil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Update</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/peternak/produk">Produk</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifikasi') }}"> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifikasi <span class="badge badge-light">{{Auth::user()->notifikasi->where('seen', 0)->count()}}</span></a>
                    </li>
                </li>
                @else
                <li class="nav-item">
                    <a href="" class="nav-link">Investasi</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownBlog" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        <span class="glyphicon glyphicon-user"></span>
                        {{__('Member')}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a href="" class="dropdown-item">{{__('Peternak')}}</a>
                        <a href="" class="dropdown-item">{{__('Investor')}}</a>
                    </div>
                </li>

                {{-- <li class="nav-item dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        <span class="glyphicon glyphicon-user"></span>
                        {{__('Member')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="">{{__('Investor')}}</a>
                            <a href="">{{__('Peternak')}}</a>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownBlog" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                        <span class="glyphicon glyphicon-user"></span>
                        {{ Auth::user()->nama }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

            @endif
        </ul>
    </div>
</div>
</nav>

<script src="{{ asset('js/app.js') }}"></script>
