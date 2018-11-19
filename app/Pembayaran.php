<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'bukti',
        'pembayaran'
    ];

    public function pesanan()
    {
        return $this->hasOne('App\Pesanan', 'id_pembayaran');
    }

    public function mutasi()
    {
        return $this->hasOne('App\Mutasi', 'id_pembayaran');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_user');
    }
}
