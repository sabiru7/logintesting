<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

   protected $fillable = [
    'name',
    'email',
    'password',
    'avatar', // pastikan ini ada
];


    protected $hidden = [
        'password',
    ];
    public function profile()
{
    return $this->hasOne(Profile::class);
}

}
