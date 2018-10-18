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
        'nama', 'email', 'password', 'role'
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
        return $this->hasOne('App\Investor', 'id_investor');
    }

    public function peternak()
    {
        return $this->hasOne('App\Peternak', 'id_peternak');
    }

    public function diskusi()
    {
        return $this->hasMany('App\Diskusi', 'id_diskusi');
    }
}
