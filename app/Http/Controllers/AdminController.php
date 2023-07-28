<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        $userpeserta = User::where('level', 'member')->count();
        $usermentor = User::where('level', 'mentor')->count();
        $useradmin = User::where('level', 'admin')->count();
        $totaluser = User::count();
        $kelasmasuk = Kelas::where('status', 'proses')->count();
        $kelasberhasil = Kelas::where('status', 'sukses')->count();

        $info = User::where('level', '!=', 'admin')->latest()->take(10)->get();
        $allUsers = User::where('level', '!=', 'admin')->get();

    	return view('admin/dashboard', compact('userpeserta', 'usermentor', 'useradmin', 'totaluser', 'kelasmasuk',
        'kelasberhasil', 'info', 'allUsers'));
    }

    public function Profil()
    {
        return view('admin/profil_admin');
    }

    public function ProfilUpdate(Request $request)
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

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
}
