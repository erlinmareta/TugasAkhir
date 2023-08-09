<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Kategori;
use App\Models\Materi;
use App\Models\Subscription;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class KelasController extends Controller
{
    public function Kelas(Request $request){

        $searchQuery = $request->input('search');

        $kategori = Kategori::all();
        $kelasQuery = Kelas::where('user_id', Auth::user()->id)
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('judul', 'like', '%' . $searchQuery . '%');
            });

        $kelas = $kelasQuery->paginate(10);
        return view('mentor/kelas/kelas', ['kelas' => $kelas, 'kategori' => $kategori , 'searchQyery' => $searchQuery]);
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
        'kategori_id' => 'required|integer',
        'judul' => 'required|string|max:255',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'deskripsi' => 'required|string',
        'status' => 'required',
    ]);



    $data = null;
    if ($request->file("gambar")) {
        $data = $request->file("gambar")->store("kelas");
    }

    Kelas::create([
        'user_id' => Auth::user()->id,
        'kategori_id' => $request->kategori_id,
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
        $kelas = Kelas::where("id", $id)->first();
        return view('mentor/kelas/edit',['item' => $kelas , 'kategori' => $kategori]);

    }

    public function update(Request $request, $id)
    {
        if($request->gambar) {
            if ($request->gambarLama) {
                Storage::delete($request->gambarLama);
            }

            $data = $request->file("gambar")->store("kelas");
        } else {
            $data = $request->gambarLama;
        }

        Kelas::where("id", $id)->update([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'gambar' => $data,

        ]);

        return redirect('mentor/kelas/kelas')->with('success', 'Kelas berhasil diperbaruiii.');
    }

    public function hapus($id)
    {
        DB::table('kelas')->where('id',$id)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }

    public function AddMateri($id)
    {
        $kelas = Kelas::where("id", $id)->first();
        $materi = Materi::all();
        return view('mentor/kelas/add_materi', ['kelas' => $kelas]);
    }


    public function StoreMateri(Request $request, $id)
    {
        $kelas_id = $id;

        $videoPath = null;

        if ($request->hasFile('isi_materi')) {
            $video = $request->file('isi_materi');
            $videoPath = $video->store('materi');
        }
            $kelas = Kelas::findOrFail($id);
            $materi = $kelas->materi()->orderBy('urutan')->get();
            Materi::create([
                'user_id' => Auth::user()->id,
                'kelas_id' => $kelas_id,
                'judul' => $request->judul_materi,
                'isi_materi' => $videoPath,
                'deskripsi' => $request->deskripsi,
                'urutan' => $request->urutan,
        ]);

            return redirect("/mentor/kelas/kelas/");
        }

        public function detail(Request $request , $id)
        {
            $search = $request->input('search');

            $kelas = Kelas::findOrFail($id);
            $query = $kelas->materi()->orderBy('urutan');

            if ($search) {
                $query->where('judul', 'like', '%' . $search . '%');
            }

            $materi = $query->paginate(10);

        return view('mentor/kelas/detail', ['materi' => $materi , 'kelas' => $kelas]);

        }

    public function editMateri($classId, $id)
    {
        $kelas = Kelas::findOrFail($classId);
        $materi = Materi::findOrFail($id);
        return view('mentor/kelas/editmateri' , ['kelas' => $kelas , 'item' => $materi]);
    }

    public function updateMateri(Request $request, $classId, $id)
    {
        $materi = Materi::findOrFail($id);

        if ($request->isi_materi) {
            if ($request->materiLama) {
                Storage::delete($request->materiLama);
            }

        $data = $request->file("isi_materi")->store("materi");
    } else {
        $data = $request->materiLama;
    }

    $materi->update([
        'user_id' => Auth::user()->id,
        'kelas_id' => $request->kelas_id,
        'judul' => $request->judul,
        'isi_materi' => $data,
        'deskripsi' => $request->deskripsi,
        'urutan' => $request->urutan,
    ]);

    return redirect('/mentor/kelas/detail/' . $classId)->with('success', 'Materi berhasil diperbarui.');
}

    public function info($id)
    {
        $subscription = Subscription::where('kelas_id', $id)->first();
        $kelas = Kelas::where('user_id', Auth::user()->id)->where('status','sukses')->find($id);
        $rating = Rating::where('kelas_id', $id)->paginate(10);
        return view('mentor/kelas/info' , ['subscription' => $subscription , 'kelas' => $kelas, 'rating' => $rating]);
    }

}
