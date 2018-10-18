<?php

namespace App;

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

    public $tabletimestamp = false;

    public function peternak(){
        return $this->belongsTo('App\Peternak', 'id_peternak');
    }

    public function pesanan(){
        return $this->hasMany('App\Pesanan', 'id_pesanan');
    }

    public function kontrak(){
        return $this->hasOne('App\Kontrak', 'id_kontrak');
    }

    public function diskusi(){
        return $this->hasMany('App\Diskusi', 'id_diskusi');
    }

}
