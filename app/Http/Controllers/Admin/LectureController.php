<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LectureRequest;
use App\Models\module;
use App\Models\staff;
use App\Models\Stage_college_controller;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index(Request $request)
    {
        Stage_college_controller::findOrFail($request->stage_id);
       
        $data= module::latest()->with('staff')->where('stage_id', $request->stage_id)->paginate(10);
    
       
        return view('admin.department.stage.lecture.index', compact('data'));
    }

    public function create()
    {
        $staff=staff::all();
        
        return view('admin.department.stage.lecture.form',compact('staff'));
    }


    public function store(LectureRequest $request)
    { 
        module::create($request->all());
       
        return redirect()->back()->with([
            'message' => 'بەسەرکەوتووی دروستکرا'
        ]);
    }

    

    

    public function edit($id)
    {
        $data= module::findOrFail($id);
        $staff=staff::all();
        return view('admin.department.stage.lecture.form', compact('data'),compact('staff'));
    }


    public function update(LectureRequest $request, $id)
    {
        Stage_college_controller::findOrFail($request->stage_id);
        $data= module::findOrFail($id)->update($request->all());

        return redirect()->back()->with([
            'message' => 'بەسەرکەوتووی تازەکرایەوە'
        ]);
    }


    public function destroy($id)
    {
        module::findOrFail($id)->delete();

        return redirect()->back();
    }
}
