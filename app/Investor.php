<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
  protected $table = 'investor';

  protected $fillable = [
    'jenis_kelamin',
    'no_telp',
    'id_user'
  ];

  public $tabletimestamp = false;

  public function user(){
    return $this->hasOne('App\User', 'id_user');
  }

}
