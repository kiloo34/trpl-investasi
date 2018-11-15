<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';

    protected $fillable = [
        'subject',
        'seen',
        'id_pesanan',
        'id_pembayaran',
        'id_diskusi',
        'id_mutasi',
        'id_balas',
        'id_progres',
        'id_user'
    ];

    public $timestamps = true;

    public function pesanan()
    {
        return $this->belongsTo('App\Pesanan', 'id_pesanan');
    }

    public function pembayaran()
    {
        return $this->belongsTo('App\Pembayaran', 'id_pembayaran');
    }

    public function diskusi()
    {
        return $this->belongsTo('App\Diskusi', 'id_diskusi');
    }

    public function mutasi()
    {
        return $this->belongsTo('App\Mutasi', 'id_mutasi');
    }

    public function balas()
    {
        return $this->belongsTo('App\Balas', 'id_balas');
    }

    public function progres()
    {
        return $this->belongsTo('App\Progres', 'id_progres');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
}
