<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InsuranceController extends Controller
{
    public function create()
    {
        return view('insurances.create');
    }

    public function store()
    {
        
    }

    public function edit()
    {
        return view('insurances.edit');
    }

    public function update()
    {
        
    }

    // admin only
    public function destroy()
    {
        
    }
}
