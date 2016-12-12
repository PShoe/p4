<?php

namespace p4;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**    *
    * @var array
    */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
    *
    * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function artpieces() {
        return $this->hasMany('p4\Artpiece');
    }

}
