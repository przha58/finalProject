<?php

use App\Http\Controllers\Admin\StageCollegeControllerController;
use App\Http\Controllers\Admin\DepartmentCollegeController;
use App\Http\Controllers\Admin\CollegeInstitueController;
use App\Http\Controllers\Admin\LectureController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\StaffController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('users', UserController::class)->names('admin.users');
    Route::resource('staff', StaffController::class)->names('admin.staff');
    Route::resource('college',CollegeInstitueController::class)->names('admin.college');
    Route::resource('department',DepartmentCollegeController::class)->names('admin.department');
    Route::resource('stage',StageCollegeControllerController::class)->names('admin.stage');
    Route::resource('lecture',LectureController::class)->names('admin.lecture');
});