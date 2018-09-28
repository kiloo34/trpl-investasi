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

  public function scopeSelectMode($q)
  {
    // $data = [];
    // $data[] = [
    // 	'text'=>'Pilih Member',
    // 	'value'=>''
    // ];
    // foreach ($q->get() as $d) {
    // 	$data[] = [
    // 		'text'=>$d->nama_ktp,
    // 		'value'=>$d->id,
    // 	];
    // }
    // return $data;
  }
}
