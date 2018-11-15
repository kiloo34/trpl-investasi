<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progres extends Model
{
    protected $table = 'progres';

    protected $fillable = [
        'foto',
        'aktifitas',
        'desripsi',
        'id_pesanan'
    ];

    public $timestamps = 'true';

    public function pesanan()
    {
        return $this->belongsTo('App\Pesanan', 'id_pesanan');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_notifikasi');
    }
}
