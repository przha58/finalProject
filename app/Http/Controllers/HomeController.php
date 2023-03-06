<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\college__institues;
use App\Models\departments;
use App\Models\User;
use App\Models\staff;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=[
            ['name' => 'Users', 'icon' => 'bi bi-person', 'count' => User::count()], 
            ['name' => 'staffs', 'icon' => 'bi bi-people', 'count' => staff::count()],
            ['name' => 'College/Institues', 'icon' => 'bi bi-building', 'count' => college__institues::count()],
            ['name' => 'Departments', 'icon' => 'bi bi-building', 'count' => departments::count()],
           
        ];
        return view('admin.home', compact('data'));
    }
}
