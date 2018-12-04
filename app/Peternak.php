<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
    protected $table = 'peternak';

    protected $fillable = [
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'foto_kandang',
        'foto_ktp',
        'foto_profil',
        'jenis_kelamin',
        'no_telp',
        'no_ktp',
        'tgl_lahir',
        'id_akun_bank',
        'id_user'
    ];

    public $tabletimestamp = false;

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function akun_bank()
    {
        return $this->belongsTo('App\AkunBank', 'id_akun_bank');
    }

    public function produk(){
        return $this->hasMany('App\Produk', 'id_produk');
    }

}
