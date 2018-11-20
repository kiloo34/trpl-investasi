<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title> Ngoter - @yield('title') </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">
    <link href="/css/app.css" rel="stylesheet">
    @yield('css')
    <style>
        html, body{
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
        }

    </style>
</head>
<body>
    @include('navbar')
    @yield('header')
    <div>
            {{-- style="width:100%;height: 100%;position: relative;" --}}
        <div class="container" >
                {{-- style="top: 50%; left: 50%; position: absolute; transform: translate(-50%, -50%);" --}}
            @yield('content')
        </div>
    </div>

    <br>

    @include('footer')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    @stack('script')

</body>
</html>

