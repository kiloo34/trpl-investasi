<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $table = 'investor';

    protected $fillable = [
        'jenis_kelamin',
        'no_telp',
        // 'no_ktp',
        'id_user'
    ];

    public $tabletimestamp = false;

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function pesanan(){
        return $this->hasMany('App\Pesanan', 'id_pesanan');
    }

}
