<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone_num',
    ];

    protected $rules = [
        'first_name' => 'required|alpha',
        'last_name' => 'required|alpha',
        'middle_name' => 'alpha',
        'email' => 'unique:customers',
        'phone_num' => 'required|unique:customers|regex:/^\+?[^a-zA-Z]{5,}$/'
    ];

    public function insurances()
    {
        return $this->belongsToMany('App\Insurance', 'customer_insurances');
    }

    public function requests()
    {
        return $this->hasMany('App\Request');
    }
}
