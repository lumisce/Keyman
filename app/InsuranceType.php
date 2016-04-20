<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceType extends Model
{
    protected $fillable = [
        'name',
    ];

    public function insurances()
    {
        return $this->hasMany('App\Insurance');
    }
}
