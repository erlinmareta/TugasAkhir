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

Route::get('/login',[App\Http\Controllers\LoginController::class,'login'])->name('login');
Route::get('/registrasi',[App\Http\Controllers\LoginController::class,'registrasi'])->name('registrasi');
Route::post('/registeruser',[App\Http\Controllers\LoginController::class,'registeruser'])->name('registeruser');
Route::get('/loginproses',[App\Http\Controllers\LoginController::class,'loginproses'])->name('loginproses');
Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])->name('logout');
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class,'index'])->name('dashboard.admin');
Route::get('member/dashboard',[App\Http\Controllers\MemberController::class,'index']);
Route::get('member/browse_course',[App\Http\Controllers\CourseController::class,'BrowseCourse']);
Route::get('member/class_detail',[App\Http\Controllers\CourseController::class,'ClassDetail']);
Route::get('member/quis_student',[App\Http\Controllers\QuizController::class,'TakeQuiz']);
Route::get('member/mentor_profil',[App\Http\Controllers\MemberController::class,'MentorProfil']);
Route::get('member/student_course',[App\Http\Controllers\CourseController::class,'StudentCourse']);
Route::get('member/student_quiz',[App\Http\Controllers\CourseController::class,'StudentQuiz']);
Route::get('member/student_profil',[App\Http\Controllers\MemberController::class,'StudentProfil']);
Route::get('member/student_dashboard',[App\Http\Controllers\MemberController::class,'StudentDashboard']);

//mentor
Route::get('mentor/instructor_dashboard',[App\Http\Controllers\MentorController::class,'InstructorDashboard']);
Route::get('mentor/instructor_course',[App\Http\Controllers\MentorController::class,'InstructorCourse']);
Route::get('mentor/edit_course',[App\Http\Controllers\MentorController::class,'EditCourse']);
Route::get('mentor/instructor_profil',[App\Http\Controllers\MentorController::class,'InstructorProfil']);
Route::get('mentor/instructor_quiz',[App\Http\Controllers\MentorController::class,'InstructorQuiz']);
Route::get('mentor/edit_quiz',[App\Http\Controllers\MentorController::class,'EditQuiz']);