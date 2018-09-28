<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{asset('css/modern-business.css')}}" rel="stylesheet">

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
          <a class="nav-link" href="/"> Beranda </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.html">Tentang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Kontak</a>
        </li>

        @if (!Auth::check())
          @if (Auth::check())
            @if (Auth::user()->role=='peternak')

            @endif
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
        @elseif(Auth::user()->role=='investor')
          <li class="nav-item">
            <a class="nav-link" href="/investor/profil">Profil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Pantau</a>
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

        @else
            <li class="nav-item">
              <a class="nav-link" href="/peternak/profil">Profil</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Update</a>
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
        </li>
      @endif
      </ul>
    </div>
  </div>
</nav>
