<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        return view('member/dashboard');
    }

    public function MentorProfil()
    {
        return view('member/mentor_profil');
    }

    public function ClassDetail($id)
    {
        $materi = Materi::find($id);
        $materi_all = Materi::all();
        return view('member/class_detail', ['materi' => $materi, 'materi_all' => $materi_all]);
    }


    public function StudentDashboard()
    {
        return view('member/student_dashboard');
    }

    public function StudentProfil()
    {
        $user = User::findOrFail(Auth::id());
        return view('member/student_profil', compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
        $cek = $request->foto;

        if (empty($cek)) {
            if (empty($request->gambarLama)) {
                $foto = null;
            } else {
                $foto = $request->gambarLama;
            }
        } else {
            if ($request->file("foto")) {
                if ($request->gambarLama) {
                    Storage::delete($request->gambarLama);
                }
                $foto = $request->file("foto")->store("profil");
            } else {
                $foto = $request->gambarLama;
            }
        }

        $user = User::where('id', Auth::user()->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "tempat_lahir" => $request->tempat_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "nomor_telepon" => $request->nomor_telepon,
            "alamat" => $request->alamat,
            "pekerjaan" => $request->pekerjaan,
            "deskripsi" => $request->deskripsi,
            "foto" => $foto
        ]);

        return back();
    }
}
