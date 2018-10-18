<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    protected $table = 'kontrak';

    protected $fillable = [
        'profilResiko',
        'rencanaPengelolaan',
        'struktur',
        'term',
    ];

    public $tabletimestamp = false;

    public function produk(){
        return $this->belongsTo('App\Produk', 'id_produk');
    }

}
