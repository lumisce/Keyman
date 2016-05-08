<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Provider;
use App\Insurance;
use App\InsuranceType;
use URL;

class InsurancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['destroy']]);
    }

    public function create(Request $request)
    {
        $provider = Provider::findOrFail($request->segment(2));
        $types = InsuranceType::pluck('name', 'id');
        $types->prepend(null, 0);
        return view('insurances.create', compact('types', 'provider'));
    }

    public function store(Request $request)
    {
        $provider = Provider::findOrFail($request->segment(2));
        $this->validate($request, $this->getRules());
        $input = $request['type'];
        $request->merge(['insurance_type_id' => $input]);
        $insurance = $provider->insurances()->create($request->except(['type']));

        flash()->success($insurance->name . ' has been created!');
        return redirect()->route('providers.show', [$provider]);
    }

    public function edit(Provider $provider, Insurance $insurance)
    {
        $types = InsuranceType::pluck('name', 'id');
        $types->prepend(null, 0);
        if ($insurance->insuranceType) {
            $selected = $insurance->insuranceType->id;
        }

        return view('insurances.edit', compact('insurance', 'types', 'selected'));
    }

    public function update(Provider $provider, Insurance $insurance, Request $request)
    {
        $this->validate($request, $this->getRules());
        $input = $request['type'];
        $request->merge(['insurance_type_id' => $input]);

        $insurance->update($request->except(['type']));

        flash()->success($insurance->name . ' has been updated!');
        return redirect()->route('providers.show', [$provider]);
    }

    // admin only
    public function destroy(Provider $provider, Insurance $insurance)
    {
        $name = $insurance->name;
        $customers = $insurance->customers;
        $insurance->delete();
        foreach ($customers as $customer) {
            //detach customer insurance
            $customer->total_requests = $customer->requests()->count();
            $customer->save();
        }

        flash()->success($name . ' has been deleted!');
        return redirect()->route('providers.show', [$provider]);
    }

    private function getRules()
    {
        return [
            'name' => 'required',
            'type' => 'required|not_in:0',
            'payment' => 'required|not_in:0'
        ];
    }
}
