<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ngoter - @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

    <style>

    body {
        font-family: "Lato", sans-serif;
    }

    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a, .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
        cursor: pointer;
        outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover, .dropdown-btn:hover {
        color: #f1f1f1;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: -200px;
        font-size: 36px;
        margin-left: 50px;
    }

    #main {
        transition: margin-left .5s;
        padding: 16px;
    }

    .active {
    background-color: green;
    color: white;
    }

    @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
    }

    .icon-bar {
        width: 100%;
        background-color: #555;
        overflow: auto;
    }

    .icon-bar a {
        float: left;
        width: 20%;
        text-align: center;
        padding: 12px 0;
        transition: all 0.3s ease;
        color: white;
        font-size: 36px;
    }

    .icon-bar a:hover {
        background-color: #000;
    }

    .dropdown-container {
    display: none;
    background-color: #262626;
    padding-left: 8px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
    float: right;
    padding-right: 8px;
    }
    </style>

</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <span style="font-size:24px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/admin"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
            <a href="/produk"><i class="fa fa-product-hunt" aria-hidden="true"></i> Produk</a>
            <a href="/pesanan"><i class="fa fa-product-hunt" aria-hidden="true"></i> Pesanan</a>
            <a href="{{route('bank.index')}}"><i class="fa fa-university" aria-hidden="true"></i> Akun Bank</a>
            <button class="dropdown-btn"><i class="fa fa-users" aria-hidden="true"></i> Member<i class="fa fa-caret-down"></i> </button>
            <div class="dropdown-container">
                <a href="/investor">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Investor</a>
                <a href="/peternak">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Peternak</a>
            </div>
            <a href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

            <a class="nav-link" href=""> <i class="fa fa-bell-o" aria-hidden="true"></i> Notifikasi <span class="badge badge-light"> 0</span></a>
        </div>
    </div>

    <div id="main">

        @yield('content')

    </div>


    <script src="{{ asset('js/app.js') }}" > </script>
    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
    </script>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            } else {
            dropdownContent.style.display = "block";
            }
        });
        }
    </script>


</body>
</html>
