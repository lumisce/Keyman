<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeymanRequest extends Model
{
    protected $fillable = [
        'insurance_id',
        'request_type_id',
        'status',
    ];

    protected $table = 'requests';

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
