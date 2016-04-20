<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    protected $fillable = [
        'name',
    ];

    public function provider()
    {
        return $this->belongsTo('App\Provider');
    }

    public function insuranceType()
    {
        return $this->belongsTo('App\InsuranceType');
    }

    public function customers()
    {
        return $this->belongsToMany('App\Customer', 'customer_insurances');
    }
}
