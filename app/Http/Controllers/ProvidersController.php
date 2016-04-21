<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Provider;
use URL;

class ProvidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

    public function index()
    {

        
        return view('providers.index');
    }

    public function show(Provider $provider)
    {
        return view('providers.show');
    }

    // admin only
    public function create()
    {
        return view('providers.create');
    }

    // admin only
    public function store(Request $request)
    {
        
    }

    // admin only
    public function edit(Provider $provider)
    {
        return view('providers.edit');
    }

    // admin only
    public function update(Provider $provider, Request $request)
    {
        
    }

    // admin only
    public function destroy(Provider $provider, Request $request)
    {
        
    }

    private function getRules()
    {
        return [
            'first_name' => 'required|regex:/^[(a-zA-Z\s)]+$/u',
            'last_name' => 'required|regex:/^[(a-zA-Z\s)]+$/u',
            'middle_name' => 'alpha',
            'email' => 'unique:customers',
            'phone_num' => 'required|unique:customers|regex:/^\+?[^a-zA-Z]{5,}$/'
        ];
    }
}
