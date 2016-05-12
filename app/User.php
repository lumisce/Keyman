<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_num', 'is_admin'
    ];

    protected $boolean = [
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function requests()
    {
        return $this->belongsToMany('App\KeymanRequest', 'request_users', 'user_id', 'request_id')
            ->withPivot('progress')
            ->withTimestamps()
            ->orderBy('pivot_created_at', 'desc');
    }
}
