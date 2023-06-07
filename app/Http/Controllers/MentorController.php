<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function MentorDashboard()
    {
        $user = User::where('level', 'member')->count();
        $kelas = Kelas::count();
        $materi = Materi::count();
        $kelasberhasil = Kelas::where('status', 'sukses')->count();
        return view ('mentor/dashboard', compact('user', 'kelas', 'materi', 'kelasberhasil'));
    }

    public function MentorCourse()
    {
        return view ('mentor/course');
    }

    public function EditCourse()
    {
        return view ('mentor/edit_course');
    }

    public function MentorProfil()
    {
        $user = User::findOrFail(Auth::id());
        return view ('mentor/profil', compact('user'));
    }

    public function UpdateProfil(Request $request)
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
