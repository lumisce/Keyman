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
        return $this->belongsToMany('App\User', 'request_users', 'request_id', 'user_id')
            ->withPivot('progress')
            ->withTimestamps()
            ->orderBy('pivot_created_at', 'desc');
    }

    // sortby = customer, insurance, type, turnaround, consultant, status

    public function scopeOrderByCustomer($query, $order = 'asc')
    {
        $query->join('customers', 'customers.id', '=', 'requests.customer_id')
            ->orderBy('customers.last_name', $order)
            ->select('requests.*');
    }

    public function scopeOrderByInsurance($query, $order = 'asc')
    {
        $query->join('insurances', 'insurances.id', '=', 'requests.insurance_id')
            ->orderBy('insurances.name', $order)
            ->select('requests.*');
    }

    public function scopeOrderByType($query, $order = 'asc')
    {
        $query->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->orderBy('request_types.name', $order)
            ->select('requests.*');
    }

    public function scopeOrderByConsultant($query, $order = 'asc')
    {
        $query->join('request_users', 'request_users.request_id', '=', 'requests.id')
            ->join('users', 'request_users.user_id', '=', 'users.id')
            ->orderBy('users.name', $order)
            ->select('requests.*');
    }

    public function scopeOrderByStatus($query, $order = 'asc')
    {
        $query
            ->orderBy('requests.status', $order)
            ->orderBy('requests.turnaround_date', 'asc')
            ->select('requests.*');
    }

    public function scopeOrderByTurnaround($query, $order = 'asc')
    {
        $query
            ->orderBy('requests.turnaround_date', $order)
            ->orderBy('requests.status', $order)
            ->select('requests.*');
    }
}
