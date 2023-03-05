<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index()
    {
        $data= User::latest()->paginate(30);
        return view('admin.user.index', compact('data'));
    }


    public function create()
    {
        return view('admin.user.form');
    }

  
    public function store(UserRequest $request)
    {
        User::create($request->all());
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
        $data = User::findOrFail($id);
        return view('admin.user.form', compact('data'));

    }

    
    public function update(UserRequest $request, $id)
    {
        $data= User::findOrFail($id);
        
        if($request->password)
        $data->update($request->all());
        else
        $data->update($request->only('email'));
        
        return redirect()->back()->with([
            'message' => 'updated successfully'
        ]);
    }

    
    public function destroy($id)
    {
        $data= User::findOrFail($id)->delete();
        return redirect()->back()->with([
            'message' => 'updated successfully'
        ]);
    }
}
