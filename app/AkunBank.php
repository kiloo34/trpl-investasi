<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkunBank extends Model
{
    protected $table = 'akun_bank';

    protected $fillable = [
        'no_rek',
        'an',
        'id_user',
        'id_bank'
    ];

    public $timestamps = false;

    public function bank()
    {
        return $this->belongsTo('App\Bank', 'id_bank');
    }

    public function user()
    {
        return $this->belongsTo('App\Peternak', 'id_user');
    }

    public function mutasi()
    {
        return $this->hasMany('App\Mutasi', 'id_akun_bank');
    }

}
