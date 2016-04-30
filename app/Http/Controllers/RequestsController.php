<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\KeymanRequest;
use App\RequestType;
use App\Insurance;
use App\Customer;
use \DB;
use Carbon\Carbon;

class RequestsController extends Controller
{
    public function index()
    {
        return view('requests.index');
    }

    public function create(Request $request)
    {
        $customer = Customer::findOrFail($request->segment(2));
        $plans = DB::table('insurances')->join('providers', 'providers.id', '=', 'insurances.provider_id')->join('customer_insurances', 'customer_insurances.insurance_id', '=', 'insurances.id')->where('customer_insurances.customer_id', '=', $customer->id)->select(DB::raw("CONCAT(insurances.name, ' -- ', providers.name) AS full_name, insurances.id"))->pluck('full_name', 'id');
        $plans = collect($plans);
        $plans->prepend(null, 0);
        $types = RequestType::pluck('name', 'id');
        $types->prepend(null, 0);
        return view('customers.requests.create', compact('types', 'plans', 'customer'));
    }

    public function store(Request $request, Customer $customer)
    {
        $this->validate($request, $this->getRules());
        $ideal = RequestType::findOrFail($request['request_type_id'])->ideal_turnaround;
        $request['turnaround_date'] = Carbon::parse($request['turnaround_date'])->addDays($ideal)->toDateTimeString();
        $request['status'] = 'ONGOING';

        $request['customer_id'] = $customer->id;
        $insurance = Insurance::findOrFail($request['insurance_id']);
        $type = RequestType::findOrFail($request['request_type_id']);

        $krequest = new KeymanRequest($request->all());
        $customer->requests()->save($krequest);
        $customer->total_requests = $customer->requests->count();
        $customer->save();
        $insurance->requests()->save($krequest);
        $type->requests()->save($krequest);

        $krequest->customer()->associate($customer);
        $krequest->insurance()->associate($insurance);
        $krequest->type()->associate($type);
        // dd($krequest);

        flash()->success('Request has been added!');
        return redirect()->route('customers.show', [$customer]);
    }

    public function edit()
    {
        return view('customers.requests.edit');
    }

    public function update()
    {
        
    }

    // admin only
    public function destroy()
    {
        
    }

    private function getRules()
    {
        return [
            'insurance_id' => 'required|not_in:0',
            'request_type_id' => 'required|not_in:0'
        ];
    }
}
