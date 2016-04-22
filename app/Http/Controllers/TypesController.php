<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\InsuranceType;

class TypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    // admin only
    public function index()
    {
        $types = InsuranceType::all();

        return view('types.index', compact('types'));
    }

    // admin only
    public function create()
    {
        return view('types.create');
    }

    // admin only
    public function store(Request $request)
    {
        $this->validate($request, $this->getRules());
        $type = InsuranceType::create($request->all());

        flash()->success('Insurance Type has been created!');
        return redirect('types');
    }

    // admin only
    public function edit(InsuranceType $type)
    {
        return view('types.edit', compact('type'));
    }

    // admin only
    public function update(InsuranceType $type, Request $request)
    {
        $rules = $this->getRules();
        $rules['name'] = 'required|regex:/^[(a-zA-Z\s)]+$/u|unique:insurance_types' . ',id,' . $type->id;

        $this->validate($request, $rules);
        $type->update($request->all());

        flash()->success('Insurance Type has been updated!');
        return redirect(route('types.index'));
    }

    // admin only
    public function destroy(InsuranceType $type, Request $request)
    {
        $type->delete();

        flash()->success('Insurance Type has been deleted!');
        return redirect(route('types.index'));
    }

    private function getRules()
    {
        return [
            'name' => 'required|regex:/^[(a-zA-Z\s)]+$/u|unique:insurance_types'
        ];
    }
}
