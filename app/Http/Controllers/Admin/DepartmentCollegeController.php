<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\college__institues;
use App\Http\Requests\Admin\departmentRequest;
use App\Models\departments;
use Illuminate\Http\Request;

class DepartmentCollegeController extends Controller
{
    
public function index()
{

    $data= departments::latest()->paginate(30);
    return view('admin.department.index', compact('data'));
}


public function create()
{
    $college=college__institues::all();
    return view('admin.department.form',compact('college'));
}


public function store(departmentRequest $request)
{
    college__institues::findOrFail($request->college_id);
    departments::create($request->all());
    return redirect()->back()->with([
        'message' => 'created successfully'
    ]);
}


public function show($id)
{
    //
}


public function edit($id)
{
    $data = departments::findOrFail($id);
    $college= college__institues::all();
    return view('admin.department.form', compact('data','college'));

}


public function update(departmentRequest $request, $id)
{
    college__institues::findOrFail($request->college_id);
    $data= departments::findOrFail($id)->update($request->all());
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}


public function destroy($id)
{
    $data= departments::findOrFail($id)->delete();
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}

}
