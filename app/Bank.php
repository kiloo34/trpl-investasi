<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'nama_bank'
    ];

    public $timestamps = false;

    public function akun_bank()
    {
        return $this->hasOne('App\AkunBank', 'id_bank');
    }


}
