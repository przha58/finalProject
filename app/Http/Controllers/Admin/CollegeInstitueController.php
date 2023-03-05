<?php

namespace App\Http\Controllers\Admin;

use App\Models\college__institues;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\college;

class CollegeInstitueController extends Controller
{
    
public function index()
{
    $data= college__institues::latest()->paginate(30);
    return view('admin.college.index', compact('data'));
}


public function create()
{
    return view('admin.college.form');
}


public function store(college $request)
{
    college__institues::create($request->all());
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
    $data = college__institues::findOrFail($id);
    return view('admin.college.form', compact('data'));

}


public function update(college $request, $id)
{
    $data= college__institues::findOrFail($id)->update($request->all());
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}


public function destroy($id)
{
    $data= college__institues::findOrFail($id)->delete();
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}

}
