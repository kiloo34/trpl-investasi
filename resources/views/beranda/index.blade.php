@extends('view')

@section('title', 'Beranda')
@include('header')

@section('content')
  <div class="container">

    @if (Auth::check())
      <h1 class="my-4">Selamat Datang {{Auth::user()->nama}} di Ngoter</h1>
      <h3 class="my-4">Anda Sebagai {{Auth::user()->role}}</h3>
    @else
      <h1 class="my-4">Selamat Datang di Ngoter</h1>
    @endif

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <p>Ngoter adalah Ecommerce Peternakan Indonesia yang mengatasi permasalahan rantai pasokan dan distribusi hasil peternakan. Melalui teknologi, Ngoter menghubungkan peternak dengan pasar untuk memungkinkan peternak menjual produk peternakan dengan harga yang adil dan kuantitas yang berkelanjutan.</p>
        <p>Didirikan pada akhir tahun 2018 sebagai aplikasi on-demand untuk Melengkapi Project PPL tema Perkebunan untuk mengirimkan buah Naga dari lahan ke konsumen.</p>
        <br>
        <div class="col-lg-4">
          <a  href="#">
            <i class="th-1gs9 th-3wTs">Selengkapnya</i>
          </a>
        </div>
      </div>
      <div class="col-lg-6">
        
      </div>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Marketing Icons Section -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="{{ asset('image/icon/1.png')}}" alt="" style="visibility: visible;">
              {{-- <i class="fas fa-4x fa-gem text-primary mb-3 sr-icon-1" style="visibility: visible;"></i> --}}
              <h3 class="mb-3"> Langsung dari Peternak Lokal </h3>
              <p class="text-muted mb-0">Memotong rantai distribusi pertanian yang membuat harga tidak stabil.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="/image/icon/2.png" alt="" style="visibility: visible;">
              {{-- <i class="fas fa-4x fa-paper-plane text-primary mb-3 sr-icon-2" style="visibility: visible;"></i> --}}
              <h3 class="mb-3">Akses ke Pasar</h3>
              <p class="text-muted mb-0">Permintaan besar dan akses pasar yang luas.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="/image/icon/3.png" alt="" style="visibility: visible;">
              {{-- <i class="fas fa-4x fa-code text-primary mb-3 sr-icon-3" style="visibility: visible;"></i> --}}
              <h3 class="mb-3">Jangka Waktu Pembayaran Cepat</h3>
              <p class="text-muted mb-0">Sekarang penjualan produk pangan Anda tidak tergantung pada 1 pembeli.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="/image/icon/4.png" alt="" style="visibility: visible;">
              {{-- <i class="fas fa-4x fa-heart text-primary mb-3 sr-icon-4" style="visibility: visible;"></i> --}}
              <h3 class="mb-3">Harga Kompetitif</h3>
              <p class="text-muted mb-0">Menjual produk dengan harga yang kompetitif dan membayar harga yang adil bagi para petani.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="/image/icon/5.png" alt="" style="visibility: visible;">
              {{-- <i class="fas fa-4x fa-gem text-primary mb-3 sr-icon-1" style="visibility: visible;"></i> --}}
              <h3 class="mb-3"> Kemitraan Jangka Panjang </h3>
              <p class="text-muted mb-0">Kami menghargai kolaborasi positif dan kemitraan jangka panjang.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 text-center">
            <div class="service-box mt-5 mx-auto">
              <img src="/image/icon/6.png" alt="" style="visibility: visible;">
              {{-- <i class="fas fa-4x fa-gem text-primary mb-3 sr-icon-1" style="visibility: visible;"></i> --}}
              <h3 class="mb-3"> Dampak Sosial </h3>
              <p class="text-muted mb-0">Kami bertujuan membantu banyak petani untuk meningkatkan produktivitas mereka.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.row -->

    <!-- Portfolio Section -->
    <section class="bg-primary" id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading text-white">We've got what you need!</h2>
            <hr class="light my-4">
            <p class="text-faded mb-4">Start Bootstrap has everything you need to get your new website up and running in no time! All of the templates and themes on Start Bootstrap are open source, free to download, and easy to use. No strings attached!</p>
            <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Get Started!</a>
          </div>
        </div>
      </div>
    </section>
    <!-- /.row -->

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
      </div>
    </div>
  </div>
