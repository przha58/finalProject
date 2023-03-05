<?php

namespace App\Http\Controllers\Admin;

use App\Models\departments;
use App\Models\Stage_college_controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\stageRequest;

class StageCollegeControllerController extends Controller
{
        
public function index(stageRequest $request)
{

    departments::findOrFail($request->dep_id);
    $data= Stage_college_controller::latest()->where('dep_id', $request->dep_id)->paginate(10);
    return view('admin.department.stage.index', compact('data'));
}


public function create()
{
    return view('admin.department.stage.form');
}


public function store(stageRequest $request)
{
    departments::findOrFail($request->dep_id);
    Stage_college_controller::create($request->all());
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
    $data = Stage_college_controller::findOrFail($id);
    return view('admin.department.stage.form', compact('data'));

}


public function update(stageRequest $request, $id)
{
    departments::findOrFail($request->dep_id);
    $data= Stage_college_controller::findOrFail($id)->update($request->all());
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}


public function destroy($id)
{
    $data= Stage_college_controller::findOrFail($id)->delete();
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}
}
