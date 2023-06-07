<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;

use App\Models\Materi;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    public function Materi()
    {
        $materi = Materi::get();
		$kelas = Kelas::all();
        return view('mentor/materi/materi', ['materi' => $materi]);
    }

    public function TambahMateri()
    {
        $kelas = Kelas::all();
	    $materi = Materi::all();
        return view('mentor/materi/tambah', ['kelas' => $kelas]);
    }

    public function store(Request $request)
    {
        $videoPath = null;

    if ($request->hasFile('isi_materi')) {
        $video = $request->file('isi_materi');
        $videoPath = $video->store('materi');
    }
        Materi::create([
            'user_id' => Auth::user()->id,
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'isi_materi' => $videoPath,
            'deskripsi' =>$request->deskripsi,
            'status' =>$request->status,
            'urutan' =>$request->urutan,
        ]);
        return redirect('mentor/materi/materi')->with('success', 'Berhasil ditambahkan!');

    }

    public function edit($id)
    {

	    $kelas = Kelas::all();
        $materi = Materi::where("id", $id)->first();
        return view('mentor/materi/edit',['item' => $materi, 'kelas' => $kelas]);

    }

    public function update(Request $request, $id)
    {
        if($request->isi_materi) {
            if ($request->materiLama) {
                Storage::delete($request->materiLama);
            }

            $data = $request->file("isi_materi")->store("materi");
        } else {
            $data = $request->materiLama;
        }

        Materi::where("id", $id)->update([
            'user_id' => Auth::user()->id,
            'kelas_id' => $request->kelas_id,
            'judul' => $request->judul,
            'isi_materi' => $data,
            'deskripsi' =>$request->deskripsi,
            'status' =>$request->status,
            'urutan' =>$request->urutan,

        ]);

        return redirect('mentor/materi/materi')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function hapus($id)
    {
        DB::table('materi')->where('id',$id)->delete();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return back();
    }

}
