<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffRequest;
use App\Models\staff;
use App\Models\departments;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
    
        $data= staff::latest()->paginate(30);
        return view('admin.staff.index', compact('data'));
    }


public function create()
{
    $department=departments::all();
    return view('admin.staff.form',compact('department'));
}



public function store(StaffRequest $request)
{
    departments::findOrFail($request->dep_id);
    staff::create($request->all());
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
    $data = staff::findOrFail($id);
    $department= departments::all();
    return view('admin.staff.form', compact('data','department'));

}


public function update(StaffRequest $request, $id)
{
    departments::findOrFail($request->dep_id);
    $data= staff::findOrFail($id)->update($request->all());
    return redirect()->back()->with([
        'message' => 'updated successfully'
    ]);
}


public function destroy($id)
{
    $data= staff::findOrFail($id)->delete();
    return redirect()->back()->with([
        'message' => 'delete successfully'
    ]);

}
}