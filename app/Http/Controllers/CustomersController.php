<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Customer;

class CustomersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('customers.index');
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
        $this->validate($request, ['title' => 'required', 'body' => 'required']);

        $customer = Customer::create($request->all());

        $request->session()->flash('flash_message', 'Customer has been added!');

        return redirect('customers.index');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $this->validate($request, ['title' => 'required', 'body' => 'required']);

        $customer->update($request->all());

        return redirect('customers.show')->with('customer');
    }

    // admin only
    public function destroy()
    {
        
    }
}
