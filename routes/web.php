<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');

});

Route::get('/login',[App\Http\Controllers\LoginController::class,'index'])->name('login');
Route::get('/registrasi',[App\Http\Controllers\RegistrasiController::class,'index'])->name('registrasi');
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class,'index'])->name('dashboard.admin');
Route::get('mentor/dashboard',[App\Http\Controllers\MentorController::class,'index']);
Route::get('member/dashboard',[App\Http\Controllers\MemberController::class,'index']);
Route::get('member/course_detail',[App\Http\Controllers\CourseController::class,'CourseDetail']);