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
        $requests = KeymanRequest::all();
        return view('requests.index', compact('requests'));
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
        $krequest->users()->attach(\Auth::user()->id, ['progress' => 'created']);


        flash()->success('Request has been added!');
        return redirect()->route('customers.show', [$customer]);
    }

    public function edit(Customer $customer, KeymanRequest $krequest)
    {
        $receiver = $krequest->insurance->provider->email;
        $subject = $krequest->type->name;
        $content = 'Customer Name: ' . $customer->first_name . ' ' . $customer->last_name
            . ', Insurance: ' . $krequest->insurance->name;
        $status = ['ONGOING', 'PENDING'];
        $status = array_combine($status, $status);

        return view('customers.requests.edit', compact('customer', 'krequest', 'receiver', 'subject', 'content', 'status'));
    }

    public function update(Request $request, Customer $customer, KeymanRequest $krequest)
    {
        $krequest->users()->sync([\Auth::user()->id => ['progress' => 'emailed']]);
        $krequest->status = $request['status'];
        $krequest->save();

        flash()->success('Request has been updated!');
        return redirect()->back();
    }

    // admin only
    public function destroy(Request $request, Customer $customer, KeymanRequest $krequest)
    {
        $krequest->users()->detach();
        $krequest->delete();
        $customer->total_requests = $customer->requests->count();
        $customer->save();

        flash()->success('Request has been deleted!');
        return redirect()->back();
    }

    public function complete(Request $request, Customer $customer, KeymanRequest $krequest)
    {
        $tdate = $krequest->turnaround_date;

        if (Carbon::now()->startOfDay()->gt($tdate)) {
            $completed = ' (overdue)';

        } elseif (Carbon::now()->startOfDay()->lt($tdate)) {
            $completed = ' (early)';

        } else {
            $completed = ' (on time)';
        }


        $krequest->users()->sync([\Auth::user()->id => ['progress' => date('Y-m-d'). $completed]]);
        $krequest->status = 'COMPLETED';
        $krequest->save();

        flash()->success('Request has been completed!');
        return redirect()->back();
    }

    private function getRules()
    {
        return [
            'insurance_id' => 'required|not_in:0',
            'request_type_id' => 'required|not_in:0'
        ];
    }
}
