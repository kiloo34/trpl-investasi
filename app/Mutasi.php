<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasi';

    protected $fillable = [
        'nominal',
        'Status',
        'id_akun_bank',
        'id_saldo'
    ];

    public function akun_bank()
    {
        return $this->belongsTo('App\AkunBank', 'id_akun_bank');
    }

    public function saldo()
    {
        return $this->belongsTo('App\Saldo', 'id_saldo');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_mutasi');
    }

}