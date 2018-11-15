<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';

    protected $fillable = [
        'kuantitas',
        'total',
        'status',
        'id_investor',
        'id_produk',
        'id_pembayaran'
    ];

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function investor(){
        return $this->belongsTo('App\Investor', 'id_investor');
    }

    public function pembayaran()
    {
        return $this->belongsTo('App\Pembayaran', 'id_pembayaran');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_pesanan');
    }

    public function progres()
    {
        return $this->hasMany('App\Progres', 'id_pesanan');
    }
}
