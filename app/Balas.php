<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balas extends Model
{
    protected $table = 'balas';

    protected $fillable = [
        'balas',
        'id_diskusi',
        'id_user'
    ];

    public $timestamps = 'true';

    public function diskusi()
    {
        return $this->belongsTo('App\Diskusi', 'id_diskusi');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_balas');
    }

}
