<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AkunController;
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

Route::middleware(['cekLogin'])->group(function(){
    Route::get('/login',[LoginController::class,'login'])->name('login');
    Route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');
    Route::post('/registeruser',[LoginController::class,'registeruser'])->name('registeruser');
    Route::get('/loginproses',[LoginController::class,'loginproses'])->name('loginproses');
});

Route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::prefix('member')->group(function(){
    Route::get('/dashboard',[MemberController::class,'index']);
    Route::get('/home',[MemberController::class,'Home']);
    Route::get('/browse_course',[CourseController::class,'BrowseCourse']);
    Route::get('/class_detail',[CourseController::class,'ClassDetail']);
    Route::get('/quis_student',[QuizController::class,'TakeQuiz']);
    Route::get('/mentor_profil',[MemberController::class,'MentorProfil']);
    Route::get('/student_course',[CourseController::class,'StudentCourse']);
    Route::get('/student_quiz',[CourseController::class,'StudentQuiz']);
    Route::get('/student_profil',[MemberController::class,'StudentProfil']);
    Route::get('/student_dashboard',[MemberController::class,'StudentDashboard']);
    Route::put('/student_profil', [MemberController::class, 'UpdateProfile']);

});

//mentor

    Route::get('mentor/instructor_dashboard',[MentorController::class,'InstructorDashboard']);
    Route::get('mentor/instructor_course',[MentorController::class,'InstructorCourse']);
    Route::get('mentor/edit_course',[MentorController::class,'EditCourse']);
    Route::get('mentor/instructor_profil',[MentorController::class,'InstructorProfil']);
    Route::get('mentor/instructor_quiz',[MentorController::class,'InstructorQuiz']);
    Route::get('mentor/edit_quiz',[MentorController::class,'EditQuiz']);

//admin

Route::get('admin/dashboard',[AdminController::class,'index'])->name('dashboard.admin');
Route::get('admin/akun/user',[AkunController::class,'akun']);
Route::get('admin/akun/tambah',[AkunController::class,'tambahAkun']);
