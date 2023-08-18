<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Rating;
use App\Models\Kategori;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class KelasController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function Kelas(Request $request)
    {

        $searchQuery = $request->input('search');

        $kategori = Kategori::all();
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $kelasQuery = Kelas::where('user_id', $idUser)
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('judul', 'like', '%' . $searchQuery . '%');
            });

        $kelas = $kelasQuery->paginate(10);
        return view('mentor/kelas/kelas', ['kelas' => $kelas, 'kategori' => $kategori, 'searchQyery' => $searchQuery]);
    }

    public function TambahKelas()
    {
        $kategori = Kategori::all();
        $kelas = Kelas::all();
        return view('mentor/kelas/tambah', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' => 'required|string',
            'status' => 'required',
        ]);



        $data = null;
        if ($request->file("gambar")) {
            $data = $request->file("gambar")->store("kelas");
        }
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $idKategori = $this->hashids->decode($request->kategori_id)[0];

        Kelas::create([
            'user_id' => $idUser,
            'kategori_id' => $idKategori,
            'judul' => $request->judul,
            'gambar' => $data,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ]);

        return redirect('mentor/kelas/kelas')->with('success', 'Berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = Kategori::get();
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::where("id", $idKelas)->first();
        return view('mentor/kelas/edit', ['item' => $kelas, 'kategori' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        $idKategori = $this->hashids->decode($request->kategori_id)[0];
        if ($request->gambar) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $data = $request->file("gambar")->store("kelas");
        } else {
            $data = $request->gambarLama;
        }
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        Kelas::where("id", $idKelas)->update([
            'kategori_id' => $idKategori,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'gambar' => $data,

        ]);

        return redirect('mentor/kelas/kelas')->with('success', 'Kelas berhasil diperbaruiii.');
    }

    public function hapus($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];

        Kelas::where('id', $idKelas)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }

    public function AddMateri($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::whereId($idKelas)->first();
        $materi = Materi::all();
        return view('mentor/kelas/add_materi', ['kelas' => $kelas]);
    }


    public function StoreMateri(Request $request, $id)
    {
        $videoPath = null;

        if ($request->hasFile('isi_materi')) {
            $video = $request->file('isi_materi');
            $videoPath = $video->store('materi');
        }
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $kelas = Kelas::findOrFail($idKelas);

        $materi = $kelas->materi()->orderBy('urutan')->get();
        Materi::create([
            'user_id' =>$idUser,
            'kelas_id' => $idKelas,
            'judul' => $request->judul_materi,
            'isi_materi' => $videoPath,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
        ]);

        return redirect("/mentor/kelas/kelas/");
    }

    public function detail(Request $request, $id)
    {
        $search = $request->input('search');
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::findOrFail($idKelas);
        $materi = Materi::orderBy('urutan')->where('kelas_id',$idKelas)->paginate(10);
        if ($search) {
            $materi = Materi::where('judul', 'like', '%' . $search . '%')->paginate(10);
        }
        return view('mentor/kelas/detail', ['materi' => $materi, 'kelas' => $kelas]);
    }

    public function editMateri($classId, $id)
    {
        // decode
        $idKelas = $this->hashids->decode($classId)[0];
        $idMateri = $this->hashids->decode($id)[0];

        $kelas = Kelas::findOrFail($idKelas);
        $materi = Materi::findOrFail($idMateri);
        return view('mentor/kelas/editmateri', ['kelas' => $kelas, 'item' => $materi]);
    }

    public function updateMateri(Request $request, $classId, $id)
    {
        // decode
        $idMateri = $this->hashids->decode($id)[0];
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $idKelas = $this->hashids->decode($request->kelas_id)[0];

        $materi = Materi::findOrFail($idMateri);

        if ($request->isi_materi) {
            if ($request->materiLama) {
                Storage::delete($request->materiLama);
            }

            $data = $request->file("isi_materi")->store("materi");
        } else {
            $data = $request->materiLama;
        }

        $materi->update([
            'user_id' =>$idUser,
            'kelas_id' => $idKelas,
            'judul' => $request->judul,
            'isi_materi' => $data,
            'deskripsi' => $request->deskripsi,
            'urutan' => $request->urutan,
        ]);

        return redirect('/mentor/kelas/detail/' . $classId)->with('success', 'Materi berhasil diperbarui.');
    }

    public function hapusMateri($id)
    {
        // decode
        $idMateri = $this->hashids->decode($id)[0];

        Materi::where('id', $idMateri)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }

    public function info($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $subscription = Subscription::where('kelas_id', $idKelas)->first();
        $kelas = Kelas::where('user_id', $idUser)->where('status', 'sukses')->find($idKelas);
        $rating = Rating::where('kelas_id', $idKelas)->paginate(10);
        return view('mentor/kelas/info', ['subscription' => $subscription, 'kelas' => $kelas, 'rating' => $rating]);
    }
}
