<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Request;
use App\RequestType;

class RequestsController extends Controller
{
    public function index()
    {
        return view('requests.index');
    }

    public function create()
    {
        $plans = \DB::table('insurances')->join('providers', 'providers.id', '=', 'insurances.provider_id')->select(\DB::raw("CONCAT(insurances.name, ' -- ', providers.name) AS full_name, insurances.id"))->pluck('full_name', 'id');
        $plans = collect($plans);
        $plans->prepend(null);
        $types = RequestType::all();
        return view('requests.create', compact('types', 'plans'));
    }

    public function store()
    {
        
    }

    public function edit()
    {
        return view('requests.edit');
    }

    public function update()
    {
        
    }

    // admin only
    public function destroy()
    {
        
    }
}
