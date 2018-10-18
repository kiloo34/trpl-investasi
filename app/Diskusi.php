<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskusi extends Model
{
    protected $table = 'diskusi';

    public $fillable = [
        'body', 'id_user',
    ];

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }

    public function user(){
        return $this->belongsTo('App\Users', 'id_user');
    }
}
