<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserSG extends Authenticatable
{
    use Notifiable;

    protected $table = 'personas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','rol','psw', 'mail'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id_persona'
    ];


    public function getAuthPassword()
    {
      return $this->psw;
    }
}
