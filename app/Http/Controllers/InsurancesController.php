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

    public function create()
    {
        $types = InsuranceType::pluck('name', 'id');
        $types->prepend(null);
        return view('insurances.create', compact('types'));
    }

    public function store(Request $request)
    {
        $provider = Provider::findOrFail($request->segment(2));
        $this->validate($request, $this->getRules());
        $input = $request['type'];
        $request->merge(['insurance_type_id' => $input]);
        $insurance = $provider->insurances()->create($request->except(['type']));

        flash()->success('Insurance Plan has been created!');
        return redirect()->route('providers.show', [$provider]);
    }

    public function edit(Provider $provider, Insurance $insurance)
    {
        $types = InsuranceType::pluck('name', 'id');
        $types->prepend(null);
        $types = $types->all();
        // dd($insurance->insuranceType->name);
        return view('insurances.edit', compact('insurance', 'types'));
    }

    public function update(Provider $provider, Insurance $insurance)
    {
        return redirect()->route('providers.show', [$provider]);
    }

    // admin only
    public function destroy(Provider $provider, Insurance $insurance)
    {
        return redirect()->route('providers.show', [$provider]);
    }

    private function getRules()
    {
        return [
            'name' => 'required',
            'type' => 'required|not_in:0'
        ];
    }
}
