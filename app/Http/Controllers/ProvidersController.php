<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProvidersController extends Controller
{
    public function index()
    {
        return view('providers.index');
    }

    public function show()
    {
        return view('providers.show');
    }

    // admin only
    public function create()
    {
        return view('providers.create');
    }

    // admin only
    public function store()
    {
        
    }

    // admin only
    public function edit()
    {
        return view('providers.edit');
    }

    // admin only
    public function update()
    {
        
    }

    // admin only
    public function destroy()
    {
        
    }
}
