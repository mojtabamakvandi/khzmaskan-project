<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function managers()
    {
        return $this->hasMany(Manager::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
