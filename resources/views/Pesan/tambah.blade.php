@extends('view')
@include('navbar')
<style>
        body { -webkit-font-smoothing: antialiased; text-rendering: optimizeLegibility; font-family: 'Noto Sans', sans-serif; letter-spacing: 0px; font-size: 14px; color: #2e3139; font-weight: 400; line-height: 26px; }
        h1, h2, h3, h4, h5, h6 { letter-spacing: 0px; font-weight: 400; color: #1c1e22; margin: 0px 0px 15px 0px; font-family: 'Noto Sans', sans-serif; }
        h1 { font-size: 42px; line-height: 50px; }
        h2 { font-size: 36px; line-height: 42px; }
        h3 { font-size: 20px; line-height: 32px; }
        h4 { font-size: 18px; line-height: 32px; }
        h5 { font-size: 14px; line-height: 20px; }
        h6 { font-size: 12px; line-height: 18px; }
        p { margin: 0 0 20px; line-height: 1.8; }
        p:last-child { margin: 0px; }
        ul, ol { }
        a { text-decoration: none; color: #2e3139; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; }
        a:focus, a:hover { text-decoration: none; color: #0943c6; }
        .content{padding-top:80px; padding-bottom:80px};


        /*------------------------
        Radio & Checkbox CSS
        -------------------------*/
        .form-control { border-radius: 4px; font-size: 14px; font-weight: 500; width: 100%; height: 70px; padding: 14px 18px; line-height: 1.42857143; border: 1px solid #dfe2e7; background-color: #dfe2e7; text-transform: capitalize; letter-spacing: 0px; margin-bottom: 16px; -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075); -webkit-appearance: none; }

        input[type=radio].with-font, input[type=checkbox].with-font { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }
        input[type=radio].with-font~label:before, input[type=checkbox].with-font~label:before { font-family: FontAwesome; display: inline-block; content: "\f1db"; letter-spacing: 10px; font-size: 1.2em; color: #dfe2e7; width: 1.4em; }
        input[type=radio].with-font:checked~label:before, input[type=checkbox].with-font:checked~label:before { content: "\f00c"; font-size: 1.2em; color: #0943c6; letter-spacing: 5px; }
        input[type=checkbox].with-font~label:before { content: "\f096"; }
        input[type=checkbox].with-font:checked~label:before { content: "\f046"; color: #0943c6; }
        input[type=radio].with-font:focus~label:before, input[type=checkbox].with-font:focus~label:before, input[type=radio].with-font:focus~label, input[type=checkbox].with-font:focus~label { }

        .box { background-color: #fff; border-radius: 8px; border: 2px solid #e9ebef; padding: 25px; margin-bottom: 40px; }
        .box-title { margin-bottom: 30px; text-transform: uppercase; font-size: 16px; font-weight: 700; color: #094bde; letter-spacing: 2px; }
        .plan-selection { border-bottom: 2px solid #e9ebef; padding-bottom: 25px; margin-bottom: 35px; }
        .plan-selection:last-child { border-bottom: 0px; margin-bottom: 0px; padding-bottom: 0px; }
        .plan-data { position: relative; }
        .plan-data label { font-size: 20px; margin-bottom: 15px; font-weight: 400; }
        .plan-text { padding-left: 35px; }
        .plan-price { position: absolute; right: 0px; color: #094bde; font-size: 20px; font-weight: 700; letter-spacing: -1px; line-height: 1.5; bottom: 43px; }
        .term-price { bottom: 18px; }
        .secure-price { bottom: 68px; }
        .summary-block { border-bottom: 2px solid #d7d9de; }
        .summary-block:last-child { border-bottom: 0px; }
        .summary-content { padding: 28px 0px; }
        .summary-price { color: #094bde; font-size: 20px; font-weight: 400; letter-spacing: -1px; margin-bottom: 0px; display: inline-block; float: right; }
        .summary-small-text { font-weight: 700; font-size: 12px; color: #8f929a; }
        .summary-text { margin-bottom: -10px; }
        .summary-title { font-weight: 700; font-size: 14px; color: #1c1e22; }
        .summary-head { display: inline-block; width: 120px; }

        .widget { margin-bottom: 30px; background-color: #e9ebef; padding: 50px; border-radius: 6px; }
        .widget:last-child { border-bottom: 0px; }
        .widget-title { color: #094bde; font-size: 16px; font-weight: 700; text-transform: uppercase; margin-bottom: 25px; letter-spacing: 1px; display: table; line-height: 1; }

        .btn { font-family: 'Noto Sans', sans-serif; font-size: 16px; text-transform: capitalize; font-weight: 700; padding: 12px 36px; border-radius: 4px; line-height: 2; letter-spacing: 0px; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; transition: all 0.3s; word-wrap: break-word; white-space: normal !important; }
        .btn-default { background-color: #0943c6; color: #fff; border: 1px solid #0943c6; }
        .btn-default:hover { background-color: #063bb3; color: #fff; border: 1px solid #063bb3; }
        .btn-default.focus, .btn-default:focus { background-color: #063bb3; color: #fff; border: 1px solid #063bb3; }
    </style>
@section('content')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
                    <div class="box">
                        <form action="{{ route('order.store', $produk->id) }}" method="post">
                            {{ csrf_field() }}
                            <h3 class="box-title">Complete your Order</h3>
                            <div class="plan-selection">
                                <div class="plan-data">
                                    <img class="img-fluid" src="{{ $produk->foto_produk }}" alt="Card image cap" style="max-height: 160px;">
                                </div>
                            </div>
                            <input type="hidden" name="id_produk" value="{{$produk->id}}">
                            <div class="plan-selection">
                                <div class="form-group">
                                    <label for="nama_produk" class="control-label">{{__('Nama Produk')}}:</label>
                                    <span>
                                        <input name="nama_produk" class="form-control" value="{{$produk->nama_produk}}" readonly>
                                    </span>
                                </div>
                            </div>
                            <div class="plan-selection">
                                <div class="form-group">
                                    <label for="periode" class="control-label">{{__('Periode')}}:</label>
                                    <span>
                                        <input name="periode" class="form-control" type="text" value="{{$produk->periode}}" readonly>
                                    </span>
                                </div>
                            </div>
                            <div class="plan-selection">
                                <div class="form-group">
                                    <label for="stock" class="control-label">{{__('Stock')}}:</label>
                                    <span>
                                        <input name="stock" class="form-control" type="text" value="{{$produk->stock}}" readonly id="stock">
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto_produk" class="control-label">{{__('Harga')}}:</label>
                                <span>
                                    <input class="form-control" type="number" value="{{$produk->harga}}" readonly id="hargaProduk">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="foto_produk" class="control-label">{{__('Kuantitas')}}:</label>
                                <span>
                                    <input name="kuantitas" class="form-control" type="number" placeholder="0" onkeyup="hitungTotal()" id="qty" required>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="total" class="control-label">{{__('Total')}}:</label>
                                <span>
                                    <input name="total" placeholder="{{$produk->harga}}" class="form-control" readonly id="total">
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="total" class="control-label">{{__('Metode Pembayaran')}}:</label>
                                @foreach ($saldo as $s)
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="transfer" name="pembayaran" value="transfer" class="custom-control-input">
                                        <label class="custom-control-label" for="transfer">Transfer</label>
                                        <input type="hidden" name="status" value="Menunggu Pembayaran">
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="saldo" name="pembayaran" value="saldo" class="custom-control-input">
                                        <label class="custom-control-label" value="{{$s->saldo}}"  for="saldo">Saldo</label>
                                        <input type="hidden" name="id_saldo" value="{{ $s->id }}">
                                        <input type="hidden" name="status" value="Dalam Proses">
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" action="{{ route('order.store') }}" class="btn btn-default" id="btn_beli">Beli</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                    <div class="box">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        function hitungTotal()
        {
            var qty, hargaProduk, total, stock;

            qty = parseInt($('#qty').val());
            stock = parseInt($('#stock').val());
            saldo = parseInt($('#saldo').val());

            if ( qty > stock ) {
                alert('Kuantitas Melebihi Stock\nLihat Stock !!');
                window.location.reload();
            } else if (qty < 0 || qty == 0 ) {
                alert('Kuantitas Tidak Boleh - atau 0\nCoba Lagi !!');
                $("#qty").val(0);
                window.location.reload();
            } else {
                qty = parseInt($('#qty').val());
                hargaProduk = parseInt($('#hargaProduk').val());
                total = 0;
                total = qty * hargaProduk;
                // console.log(hargaProduk);
                // console.log($('#hargaProduk').val());
                $("#total").val(total);
            }
        }
    </script>
{{--
    <script type="text/javascript">

        saldo = parseInt($('#saldo').val());
        total = parseInt($('#total').val());

        ready(function() {
            $('#btn_beli').on('click', function(e) {
                e.preventDefault();
                if (total > saldo) {
                    alert('Saldo anda tidak Mencukupi Untuk Melakukan Pemesanan Slot ini \n Coba Pilih Metode Pembayaran yang lain')
                    window.location.reload();
                }
            })
        })
    </script> --}}
@endpush
