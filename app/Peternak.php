<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peternak extends Model
{
  protected $table = 'peternak';

  protected $fillable = [
    'nama',
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
    'id_user'
  ];

  public $tabletimestamp = false;

  public function user(){
    return $this->hasOne('App\User', 'id_user');
  }

}
