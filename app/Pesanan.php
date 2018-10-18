<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $filliable = [
        'kuantitas',
        'total',
        'id_investor',
        'id_produk',
    ];

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function investor(){
        return $this->belongsTo('App\Investor', 'id_investor');
    }

}
