<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Kategori;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function Kelas(){

        $kategori = Kategori::all();
		$kelas = Kelas::where('user_id', Auth::user()->id)->get();
        return view('mentor/kelas/kelas', ['kelas' => $kelas, 'kategori' => $kategori]);
    }

    public function TambahKelas()
    {
        $kategori = Kategori::all();
		$kelas = Kelas::all();
        return view('mentor/kelas/tambah', ['kategori' => $kategori]);
    }

    public function store(Request $request)
    {
        if($request->file("gambar")) {
            $data = $request->file("gambar")->store("kelas");
        }

        Kelas::create([
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'gambar' =>$data,
            'deskripsi' =>$request->deskripsi,
            'status' =>$request->status,
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

        return redirect('mentor/kelas/kelas')->with('success', 'Kelas berhasil diperbarui.');
    }


    public function hapus($id)
    {
        DB::table('kelas')->where('id',$id)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }


}
