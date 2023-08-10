<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use Hashids\Hashids;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Rating;
use App\Models\Catatan;
use App\Models\Comment;
use App\Models\History;
use App\Models\Pendidikan;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function index()
    {
        return view('member/student_dashboard');
    }

    public function MentorProfil($id)
    {
        // decode
        $idUser = $this->hashids->decode($id)[0];
        $datakelas = Kelas::where('user_id', $idUser)->where('status', 'sukses')->get();
        $datamentor = User::where('id', $idUser)->first();

        $jumlahsubscribe = Subscription::where('user_id', $idUser)->count();
        $pendidikan = Pendidikan::where('user_id', $idUser)->get();

        return view(
            'member/mentor_profil',
            [
                'datakelas' => $datakelas,
                'datamentor' => $datamentor,
                'jumlahsubscribe' => $jumlahsubscribe,
                'pendidikan' => $pendidikan,
            ]
        );
    }

    public function ClassDetail($kelas, $materi)
    {
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $idKelas = $this->hashids->decode($kelas)[0];
        $idMateri = $this->hashids->decode($materi)[0];

        $history = History::where("user_id", $idUser)->first();

        if (empty($history)) {
            History::create([
                "kelas_id" => $idKelas,
                "user_id" => $idUser,
                "materi_id" => $idMateri,
                "status" => "1"
            ]);
        } else {
            $history = History::where("kelas_id", $idKelas)->where("materi_id", $idMateri)->where("user_id", $idUser)->first();

            if ($history) {
            } else {
                History::create([
                    "kelas_id" => $idKelas,
                    "user_id" => $idUser,
                    "materi_id" => $idMateri,
                    "status" => "1"
                ]);
            }
        }

        $isSubscribed = Subscription::where("kelas_id", $idKelas)->where("user_id", $idUser)->first();
        if ($isSubscribed == null) {
            Subscription::create([
                "kelas_id" => $idKelas,
                "user_id" => $idUser,
            ]);
        }
        $datamateri = Materi::findOrFail($idMateri);
        $datakelas = $datamateri->kelas_id;

        $sebelumnya = Materi::where("id", "<", $idMateri)->where("kelas_id", $datakelas)->orderBy("id", "DESC")->first();
        $selanjutnya = Materi::where("id", ">", $idMateri)->where("kelas_id", $datakelas)->orderBy("id", "ASC")->first();

        $comments = Comment::where("kelas_id", $idKelas)->where("materi_id", $idMateri)->where("reply_id", null)->with('reply')->get();
        $catatans = Catatan::where("kelas_id", $idKelas)->where("materi_id", $idMateri)->where('user_id', $idUser)->get();
        $ratings = Rating::where("kelas_id", $idKelas)->orderBy('rating', 'desc')->limit(3)->get();
        $materi_all = Materi::where('kelas_id', $idKelas)->get();

        return view('member.class_detail', [
            "materi" => $datamateri,
            "materi_all" => $materi_all,
            "sebelumnya" => $sebelumnya,
            "selanjutnya" => $selanjutnya,
            "comments" => $comments,
            "catatans" => $catatans,
            "kelas" => $idKelas,
            "ratings" => $ratings
        ]);
    }

    public function Comment(Request $request, $kelas, $materi)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $idMateri = $this->hashids->decode($materi)[0];
        $idKelas = $this->hashids->decode($kelas)[0];

        if ($request->comment !== null) {
            Comment::create([
                "kelas_id" => $idKelas,
                "materi_id" => $idMateri,
                "user_id" => $idUser,
                "reply_id" => $request->reply,
                "comment" => $request->comment,
            ]);
        }
        return redirect()->back();
    }
    public function Catatan(Request $request, $kelas, $materi)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $idMateri = $this->hashids->decode($materi)[0];
        $idKelas = $this->hashids->decode($kelas)[0];

        if ($request->catatan !== null) {
            Catatan::create([
                "kelas_id" => $idKelas,
                "materi_id" => $idMateri,
                "user_id" => $idUser,
                "catatan" => $request->catatan,
                "timestamp" => $request->timestamp
            ]);
        }
        return redirect()->back();
    }

    public function StudentDashboard()
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $datakelas = Subscription::where('user_id', $idUser)
            // ->where('kelas_id', $id)
            ->get();
        $history = History::where("user_id", $idUser)->pluck("materi_id")->toArray();
        return view('member/student_dashboard', [
            'datakelas' => $datakelas,
            'history' => $history,
        ]);
    }

    public function StudentCourse()

    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $datakelas = Subscription::where('user_id', $idUser)->get();
        $history = History::where("user_id", $idUser)->pluck("materi_id")->toArray();

        return view('member/student_course', [
            'datakelas' => $datakelas,
            'history' => $history
        ]);
    }

    public function StudentProfil()
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $user = User::findOrFail($idUser);
        return view('member/student_profil', compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
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

        $user = User::where('id', $idUser)->update([
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
        $request->validate([
            'ulasan' => 'required|string|max:255', // Anda dapat menyesuaikan aturan validasi sesuai kebutuhan
            'rating' => 'required|integer|min:1|max:5', // Contoh validasi untuk field rating
        ]);
        // decode
        $idMateri = $this->hashids->decode($id_materi)[0];
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $materi = Materi::where("id", $idMateri)->first();

        Rating::create([
            "kelas_id" => $materi["kelas_id"],
            "user_id" => $idUser,
            "materi_id" => $idMateri,
            "ulasan" => $request->ulasan,
            "rating" => $request->rating
        ]);

        return back();
    }

    public function getSertifikat($id)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $idKelas = $this->hashids->decode($id)[0];

        $user = User::find($idUser);
        $kelas = Kelas::findOrFail($idKelas);
        $mentor = $kelas->user;


        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $pdf = PDF::loadView('member.sertifikat', ['user' => $user, 'kelas' => $kelas])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
