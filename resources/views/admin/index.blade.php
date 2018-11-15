@extends('view-admin')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-address-card fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">{{ count($peternak) }} Peternak</div>
                    </div>
                        <a class="card-footer text-white clearfix small z-1" href="/peternak">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                                <i class="fa fa-caret-right" aria-hidden="true"></i>
                            </span>
                        </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-address-card fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">{{ count($investor) }} Investor</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/investor">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-shopping-cart fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">{{ count($pesanan) }} Pesanan</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/pesanan">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-product-hunt fa-4x" aria-hidden="true"></i>
                        </div>
                        <div class="mr-5">{{ count($produk) }} Produk</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="/produk">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Perubahan Harga</div>
            <div class="card-body">
                <canvas id="myAreaChart" width="100%" height="30px"></canvas>
            </div>
            <div class="card-footer small text-muted"></div>
        </div>

        <div class="panel panel-default">

        </div>

        {{-- <script src="js/demo/datatables-demo.js"></script> --}}
        <script src="js/demo/chart-area-demo.js"></script>

    </div>
@endsection
