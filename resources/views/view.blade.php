<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title> Ngoter - @yield('title') </title>

    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">

  </head>
  <body>
    @include('navbar')

    <main class="py-4">
      @yield('content')
    </main>

    @include('footer')

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
</html>
