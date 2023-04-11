<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
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
    Route::get('/login',[App\Http\Controllers\LoginController::class,'login'])->name('login');
    Route::get('/registrasi',[App\Http\Controllers\LoginController::class,'registrasi'])->name('registrasi');
    Route::post('/registeruser',[App\Http\Controllers\LoginController::class,'registeruser'])->name('registeruser');
    Route::get('/loginproses',[App\Http\Controllers\LoginController::class,'loginproses'])->name('loginproses');
});

//member
Route::get('/logout',[App\Http\Controllers\LoginController::class,'logout'])->name('logout');

Route::prefix('member')->group(function(){
    Route::get('/dashboard',[MemberController::class,'index']);
    Route::get('/browse_course',[CourseController::class,'BrowseCourse']);
    Route::get('/class_detail',[CourseController::class,'ClassDetail']);
    Route::get('/quis_student',[QuizController::class,'TakeQuiz']);
    Route::get('/mentor_profil',[MemberController::class,'MentorProfil']);
    Route::get('/student_course',[CourseController::class,'StudentCourse']);
    Route::get('/student_quiz',[CourseController::class,'StudentQuiz']);
    Route::get('/student_profil',[MemberController::class,'StudentProfil']);
    Route::get('/student_dashboard',[MemberController::class,'StudentDashboard']);
    Route::get('/edit_profile_student',[MemberController::class,'EditProfile'])->name('EditProfile');
    Route::patch('/edit_profile_student/{id}',[MemberController::class, 'Update'])->name('profile.update');
    Route::put('/student_profil', [MemberController::class, 'UpdateProfile']);

});


//mentor
Route::get('mentor/instructor_dashboard',[App\Http\Controllers\MentorController::class,'InstructorDashboard']);
Route::get('mentor/instructor_course',[App\Http\Controllers\MentorController::class,'InstructorCourse']);
Route::get('mentor/edit_course',[App\Http\Controllers\MentorController::class,'EditCourse']);
Route::get('mentor/instructor_profil',[App\Http\Controllers\MentorController::class,'InstructorProfil']);
Route::get('mentor/instructor_quiz',[App\Http\Controllers\MentorController::class,'InstructorQuiz']);
Route::get('mentor/edit_quiz',[App\Http\Controllers\MentorController::class,'EditQuiz']);

//admin
Route::get('admin/dashboard',[App\Http\Controllers\AdminController::class,'index'])->name('dashboard.admin');
