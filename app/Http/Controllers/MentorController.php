<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Subscription;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function MentorDashboard()
    {
        $user = User::where('level', 'member')->where('id', Auth::user()->id)->count();
        $kelas = Kelas::where('user_id', Auth::user()->id)->count();
        $materi = Materi::where('user_id', Auth::user()->id)->count();
        $kelasberhasil = Kelas::where('status', 'sukses')->where('user_id', Auth::user()->id)->count();
        $totalstudent = DB::table('kelas')
                    ->select(DB::raw('count(distinct subscription.user_id) as total_student'))
                    ->join('users', 'users.id', '=', 'kelas.user_id')
                    ->join('subscription', 'subscription.kelas_id', '=', 'kelas.id')
                    ->where('kelas.user_id', Auth::user()->id)
                    ->groupBy('kelas.id', 'name')
                    ->get();


        return view('mentor/dashboard', compact('user', 'kelas', 'materi', 'kelasberhasil', 'totalstudent'));

    }

    // public function MentorProfil()
    // {
    //     $user = User::findOrFail(Auth::id());
    //     return view('mentor/profil', compact('user'));
    // }

    public function ProfileMentor()
    {
        $user = User::findOrFail(Auth::id());
        return view('mentor/profil/profil', compact('user'));

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

    public function DataMember(){

        $user = User::where("level", "member")->get();
        return view('mentor/member/member', ['user' => $user]);
    }

    public function MemberKelas()
    {
        $data['kelas'] = Kelas::where('user_id', Auth::user()->id)->where('status','sukses')->get();
        return view('mentor/member/member_kelas' , $data);
    }

    public function Student($id_kelas)
    {
        $data['subscription'] = Subscription::where('kelas_id', $id_kelas)->get();
        return view('mentor/member/student', $data);
    }

}
