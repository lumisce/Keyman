<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\RequestType;

class RequestTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // admin only
    // shows list of request types
    public function index()
    {
        $types = RequestType::all();

        return view('request_types.index', compact('types'));
    }

    // admin only
    // shows create request type form
    public function create()
    {
        return view('request_types.create');
    }

    // admin only
    // processes create request type form
    public function store(Request $request)
    {
        $this->validate($request, $this->getRules());
        $type = RequestType::create($request->all());

        flash()->success($type->name . ' has been created!');
        return redirect('request_types');
    }

    // admin only
    // shows edit request type form
    public function edit(RequestType $type)
    {
        return view('request_types.edit', compact('type'));
    }

    // admin only
    // processes edit request type form
    public function update(RequestType $type, Request $request)
    {
        $rules = $this->getRules();
        $rules['name'] = 'required|regex:/^[(a-zA-Z\s)]+$/u|unique:request_types' . ',id,' . $type->id;

        $this->validate($request, $rules);
        $type->update($request->all());

        flash()->success($type->name . ' has been updated!');
        return redirect(route('request_types.index'));
    }

    // admin only
    // processes delete request type
    public function destroy(RequestType $type, Request $request)
    {
        $type->delete();

        flash()->success($type->name . ' has been deleted!');
        return redirect(route('request_types.index'));
    }

    // validation rules
    private function getRules()
    {
        return [
            'name' => 'required|regex:/^[(a-zA-Z\s)]+$/u|unique:request_types'
        ];
    }
}
