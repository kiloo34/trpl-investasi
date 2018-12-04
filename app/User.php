<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'password', 'status', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function investor()
    {
        return $this->hasOne('App\Investor', 'id_user');
    }

    public function peternak()
    {
        return $this->hasOne('App\Peternak', 'id_user');
    }

    public function diskusi()
    {
        return $this->hasMany('App\Diskusi', 'id_diskusi');
    }

    public function akun_bank()
    {
        return $this->hasMany('App\AkunBank', 'id_user');
    }

    public function notifikasi()
    {
        return $this->hasMany('App\Notifikasi', 'id_user');
    }
}
