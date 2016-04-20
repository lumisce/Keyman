<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'name', 'location', 'email', 'phone_num',
    ];

    public function insurances()
    {
        return $this->hasMany('App\Insurance');
    }
}
