<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'insurance_id',
        'request_type_id',
        'status',
    ];

    protected $dates = ['turnaround_date'];

    public function type()
    {
        $this->belongsTo('App\RequestType');
    }

    public function insurance()
    {
        $this->belongsTo('App\Insurance');
    }

    public function customer()
    {
        $this->belongsTo('App\Customer');
    }

    public function users()
    {
        $this->belongsToMany('App\User');
    }
}
