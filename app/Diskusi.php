<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi';

    public $fillable = [
        'judul', 'body', 'id_user', 'id_produk'
    ];

    public $timestamps = 'true';

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function balas()
    {
        return $this->hasMany('App\Balas', 'id_diskusi');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_diskusi');
    }

}
