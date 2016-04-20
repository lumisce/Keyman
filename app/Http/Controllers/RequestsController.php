<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RequestsController extends Controller
{
    public function index()
    {
        return view('requests.index');
    }

    public function create()
    {
        return view('requests.create');
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
