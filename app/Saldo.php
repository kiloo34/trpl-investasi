<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    protected $table = 'saldo';

    protected $fillable = [
        'saldo',
        'keterangan',
        'sAwal',
        'sAkhir',
        'id_investor'
    ];

    public $timestamps = true;

    public function investor()
    {
        return $this->belongsTo('App\Investor', 'id_investor');
    }

    public function mutasi()
    {
        return $this->hasMany('App\Mutasi', 'id_saldo');
    }

}
