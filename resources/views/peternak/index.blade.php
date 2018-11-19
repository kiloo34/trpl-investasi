@extends('profil.index')

@section('tittle', 'Profil Peternak')

@include('navbar')

@section('content')

    {{Session::get('message')}}

    @include('footer')

@endsection
