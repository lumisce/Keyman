<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeymanRequest extends Model
{
    protected $fillable = [
        'customer_id',
        'insurance_id',
        'request_type_id',
        'turnaround_date',
        'status',
    ];

    protected $table = 'requests';

    protected $dates = ['turnaround_date'];

    public function type()
    {
        return $this->belongsTo('App\RequestType', 'request_type_id');
    }

    public function insurance()
    {
        return $this->belongsTo('App\Insurance');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
