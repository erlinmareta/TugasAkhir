<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Comment;
use App\Models\Materi;
use Illuminate\Http\Request;

use App\Models\Rating;
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

    public function ClassDetail($kelas, $materi)
    {
        $datamateri = Materi::findOrFail($materi);
        $datakelas = $datamateri->kelas_id;

        $sebelumnya = Materi::where("id", "<", $materi)->where("kelas_id", $datakelas)->orderBy("id", "DESC")->first();
        $selanjutnya = Materi::where("id", ">", $materi)->where("kelas_id", $datakelas)->orderBy("id", "ASC")->first();

        $comments = Comment::where("kelas_id", $kelas)->where("materi_id", $materi)->get();
        $catatans = Catatan::where("kelas_id", $kelas)->where("materi_id", $materi)->get();

        $materi_all = Materi::where('kelas_id', $kelas)->get();

        return view('member.class_detail', [
            "materi" => $datamateri,
            "materi_all" => $materi_all,
            "sebelumnya" => $sebelumnya,
            "selanjutnya" => $selanjutnya,
            "comments" => $comments,
            "catatans" => $catatans,
            "kelas" => $kelas
        ]);
    }

    public function Comment(Request $request, $kelas, $materi)
    {
        if ($request->comment !== null) {
            Comment::create([
                "kelas_id" => $kelas,
                "materi_id" => $materi,
                "user_id" => Auth::user()->id,
                "comment" => $request->comment,
            ]);
        }
        return redirect()->back();
    }
    public function Catatan(Request $request, $kelas, $materi)
    {
        if ($request->comment !== null) {
            Catatan::create([
                "kelas_id" => $kelas,
                "materi_id" => $materi,
                "user_id" => Auth::user()->id,
                "catatan" => $request->catatan,
                "timestamp" => $request->timestamp
            ]);
        }
        return redirect()->back();
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

    public function rating(Request $request, $id_materi)
    {
        $materi = Materi::where("id", $id_materi)->first();

        Rating::create([
            "kelas_id" => $materi["kelas_id"],
            "user_id" => Auth::user()->id,
            "materi_id" => $id_materi,
            "rating" => $request->rating
        ]);

        return back();
    }
}
