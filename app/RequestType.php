<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestType extends Model
{
    protected $fillable = [
        'name',
        'ideal_turnaround',
    ];

    public function requests()
    {
        return $this->hasMany('App\KeymanRequest');
    }
}
