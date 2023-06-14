<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KelasSayaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasAdminController;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'Home']);


Route::middleware(['cekLogin'])->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/registrasi', [LoginController::class, 'registrasi'])->name('registrasi');
    Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
    Route::get('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('member')->middleware(['auth', 'cekLevel:member'])->group(function () {
    Route::get('/dashboard', [MemberController::class, 'index']);
    Route::get('/welcome', [HomeController::class, 'Home']);
    Route::get('/class_detail/{kelas}/{materi}', [MemberController::class, 'ClassDetail']);
    Route::get('/mentor_profil', [MemberController::class, 'MentorProfil']);
    Route::get('/student_course', [CourseController::class, 'StudentCourse']);
    Route::get('/browse_course', [CourseController::class, 'BrowseCourse']);
    Route::get('/student_quiz', [CourseController::class, 'StudentQuiz']);
    Route::get('/student_profil', [MemberController::class, 'StudentProfil']);
    Route::get('/student_dashboard', [MemberController::class, 'StudentDashboard']);
    Route::put('/student_profil', [MemberController::class, 'UpdateProfile']);
});

//mentor
Route::prefix('mentor')->middleware(['auth', 'cekLevel:mentor'])->group(function () {
    Route::get('/dashboard', [MentorController::class, 'MentorDashboard']);
    Route::get('/profil', [MentorController::class, 'MentorProfil']);
    Route::put('/profil', [MentorController::class, 'UpdateProfil']);
    Route::get('/kelas/kelas', [KelasController::class, 'Kelas']);
    Route::get('/kelas/tambah', [KelasController::class, 'TambahKelas']);
    Route::get('/hapus/{id}', [KelasController::class, 'hapus']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
    Route::post('/kelas/store', [KelasController::class, 'store']);
    Route::put('/kelas/{id}', [KelasController::class, 'update']);
    Route::get('/materi/materi', [MateriController::class, 'materi']);
    Route::get('/materi/tambah', [MateriController::class, 'TambahMateri']);
    Route::post('/materi/store', [MateriController::class, 'store']);
    Route::get('/materi/edit/{id}', [MateriController::class, 'edit']);
    Route::put('/materi/{id}', [MateriController::class, 'update']);
    Route::get('/kelas_saya/kelas_saya', [KelasSayaController::class, 'KelasSaya']);
    Route::get('/kelas_saya/detail/{id}', [KelasSayaController::class, 'DetailKelas']);
    Route::get('/kelas_saya/publish/{id}', [KelasSayaController::class, 'KelasPublish'])->name('mentor.kelas_saya.publish');
});
//admin
Route::prefix('admin')->middleware(['auth', 'cekLevel:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/akun/user', [AkunController::class, 'akun']);
    Route::get('/akun/tambah', [AkunController::class, 'tambahAkun']);
    Route::get('/akun/hapus/{id}', [AkunController::class, 'hapus']);
    Route::get('/kategori/kategori', [KategoriController::class, 'Kategori']);
    Route::get('/kategori/tambah', [KategoriController::class, 'TambahKategori']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/hapus/{id}', [KategoriController::class, 'hapus']);
    Route::get('/kelas/index', [KelasAdminController::class, 'index']);
    Route::get('/kelas/detail/{id}', [KelasAdminController::class, 'Detail'])->name('admin.kelasDetail');
    Route::get('/kelas/{id}/publish', [KelasAdminController::class, 'KelasPublish']);
    Route::get('/kelas/berhasil', [KelasAdminController::class, 'KelasBerhasil']);
    Route::get('/profil_admin', [AdminController::class, 'profil']);
    Route::put('/profil/{id}', [AdminController::class, 'ProfilUpdate']);
});
