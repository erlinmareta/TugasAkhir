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
    Route::get('/reload' , [LoginController::class, 'Reload'])->name('Reload');
    Route::get('/verify' , [LoginController::class, 'verify'])->name('user.verify');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('member')->middleware(['auth', 'cekLevel:member'])->group(function () {
    Route::get('/dashboard', [MemberController::class, 'index']);
    Route::get('/welcome', [HomeController::class, 'Home']);
    Route::get('/class_detail/{kelas}/{materi}', [MemberController::class, 'ClassDetail']);
    Route::put('/class_detail/{kelas}/{materi}/comment', [MemberController::class, 'Comment']);
    Route::put('/class_detail/{kelas}/{materi}/catatan', [MemberController::class, 'Catatan']);
    Route::get('/mentor_profil/{id}', [MemberController::class, 'MentorProfil']);
    Route::get('/student_course', [MemberController::class, 'StudentCourse']);
    Route::get('/browse_course', [CourseController::class, 'BrowseCourse']);
    Route::get('/student_profil', [MemberController::class, 'StudentProfil']);
    Route::get('/student_dashboard', [MemberController::class, 'StudentDashboard']);
    Route::put('/student_profil', [MemberController::class, 'UpdateProfile']);
    Route::put("/rating/{id_materi}", [MemberController::class, "rating"]);
    Route::get('/sertifikat/{kelas}', [MemberController::class, "getSertifikat"]);
});

//mentor
Route::prefix('mentor')->middleware(['auth', 'cekLevel:mentor'])->group(function () {
    Route::get('/dashboard', [MentorController::class, 'MentorDashboard']);
    Route::get('/profil', [MentorController::class, 'MentorProfil']);
    Route::get('/profil/profil', [MentorController::class, 'ProfileMentor']);
    Route::put('/profil', [MentorController::class, 'UpdateProfil']);

    //CRUD Kelas
    Route::get('/kelas/kelas', [KelasController::class, 'Kelas']);
    Route::get('/kelas/tambah', [KelasController::class, 'TambahKelas']);
    Route::get('/hapus/{id}', [KelasController::class, 'hapus']);
    Route::get('/kelas/edit/{id}', [KelasController::class, 'edit']);
    Route::post('/kelas/store', [KelasController::class, 'store']);
    Route::put('/kelas/{id}', [KelasController::class, 'update']);

    //CRUD Materi
    Route::get('/kelas/add_materi/{id}', [KelasController::class, 'AddMateri']);
    Route::put('/kelas/StoreMateri/{id}', [KelasController::class, 'StoreMateri'])->name('mentor.kelas.store_materi');
    Route::get('/kelas/detail/{id}', [KelasController::class, 'detail']);
    Route::post('/materi/store', [MateriController::class, 'store']);
    Route::get('/materi/edit/{id}', [MateriController::class, 'edit']);
    Route::put('/materi/{id}', [MateriController::class, 'update']);

    //Kelas Publish
    Route::get('/kelas_saya/kelas_saya', [KelasSayaController::class, 'KelasSaya']);
    Route::get('/kelas_saya/detail/{id}', [KelasSayaController::class, 'DetailKelas']);
    Route::get('/kelas_saya/publish/{id}', [KelasSayaController::class, 'KelasPublish'])->name('mentor.kelas_saya.publish');

    //CRUD Member
    route::get('/member/member', [MentorController::class, 'DataMember']);
    route::get('/member/member_kelas', [MentorController::class, 'MemberKelas']);
    route::get('member/member_kelas/{id}/student', [MentorController::class, 'Student']);

    //Pendidikan
    route::get('/pendidikan/pendidikan', [MentorController::class, 'Pendidikan']);
});

//admin
Route::prefix('admin')->middleware(['auth', 'cekLevel:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard.admin');
    //user
    Route::get('/akun/user', [AkunController::class, 'akun']);
    Route::get('/akun/mentor', [AkunController::class, 'DataMentor']);
    Route::get('/akun/peserta', [AkunController::class, 'DataPeserta']);
    Route::get('/akun/admin', [AkunController::class, 'DataAdmin']);
    Route::get('/akun/tambah', [AkunController::class, 'TambahAdmin']);
    Route::post('/akun/store', [AkunController::class, 'store']);
    Route::get('/akun/hapus/{id}', [AkunController::class, 'hapus']);
    Route::get('/akun/edit/{id}', [AkunController::class, 'edit']);
    Route::put('/admin/{id}', [AkunController::class, 'update']);

    //kategori
    Route::get('/kategori/kategori', [KategoriController::class, 'Kategori']);
    Route::get('/kategori/tambah', [KategoriController::class, 'TambahKategori']);
    Route::post('/kategori/store', [KategoriController::class, 'store']);
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::put('/kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/hapuskategori/{id}', [KategoriController::class, 'Delete']);

    //kelas
    Route::get('/kelas/index', [KelasAdminController::class, 'index']);
    Route::get('/kelas/detail/{id}', [KelasAdminController::class, 'Detail'])->name('admin.kelasDetail');
    Route::get('/hapus/{id}', [KelasAdminController::class, 'HapusKelas']);
    Route::get('/kelas_masuk/{id}/publish', [KelasAdminController::class, 'KelasPublish']);
    Route::post('/index/{id}/reject', [KelasAdminController::class, 'Reject']);
    Route::get('/kelas/berhasil', [KelasAdminController::class, 'KelasBerhasil']);
    Route::get('/kelas/ditolak', [KelasAdminController::class, 'KelasDitolak']);

    //profil
    Route::get('/profil_admin', [AdminController::class, 'profil']);
    Route::put('/profil/{id}', [AdminController::class, 'ProfilUpdate']);
});
