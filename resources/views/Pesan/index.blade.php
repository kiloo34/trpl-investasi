@section('tittle', 'Riwayat Pesanan')
@extends('view')
@include('navbar')
@section('content')
    <h1 class="mt-1 mb-3">Portfolio 1
        <small>Subheading</small>
    </h1>

    <div class="row">
        <div class="col-md-7">
            <a href="#">
                <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="">
            </a>
        </div>
        <div class="col-md-5">
            <h3>Project One</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
            <a class="btn btn-primary" href="#">View Project
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
@endsection
