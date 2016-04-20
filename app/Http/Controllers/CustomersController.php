<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;
use URL;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['destroy']]);
    }

    public function index()
    {
        $customers = Customer::all();
        
        return view('customers.index', compact('customers'));
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->getRules());

        $customer = Customer::create($request->all());

        $request->session()->flash('flash_notification.message', 'Customer has been added!');
        $request->session()->flash('flash_notification.level', 'success');

        return redirect('customers');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer, Request $request)
    {
        $rules = $this->getRules();
        $rules['email'] = 'unique:customers' . ',id,' . $customer->id;
        $rules['phone_num'] = 'required|regex:/^\+?[^a-zA-Z]{5,}$/|unique:customers' . ',id,' . $customer->id;

        $this->validate($request, $rules);

        $customer->update($request->all());

        $request->session()->flash('flash_notification.message', 'Customer has been updated!');
        $request->session()->flash('flash_notification.level', 'success');

        return redirect(URL::route('customers.show', [$customer->id]));
    }

    // admin only
    public function destroy()
    {
        
    }

    private function getRules()
    {
        return [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'middle_name' => 'alpha',
            'email' => 'unique:customers',
            'phone_num' => 'required|unique:customers|regex:/^\+?[^a-zA-Z]{5,}$/'
        ];
    }
}
