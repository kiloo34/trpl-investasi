<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'foto_produk',
        'nama_produk',
        'harga',
        'periode',
        'stock',
        'deskripsi',
        'id_kontrak',
        'id_peternak',
    ];

    public $timestamp = false;

    public function peternak(){
        return $this->belongsTo('App\Peternak', 'id_peternak');
    }

    public function pesanan(){
        return $this->hasOne('App\Pesanan', 'id_produk');
    }

    public function kontrak(){
        return $this->belongsTo('App\Kontrak', 'id_kontrak');
    }

    public function diskusi(){
        return $this->hasMany('App\Diskusi', 'id_produk');
    }

}
