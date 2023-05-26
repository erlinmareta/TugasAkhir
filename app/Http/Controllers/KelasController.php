<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    public function Kelas(){

        $kelas = DB::table('kelas')->get();
        return view('mentor/kelas/kelas', ['kelas' => $kelas]);
    }

    public function TambahKelas(){
        return view('mentor/kelas/tambah');
    }

    public function store(Request $request)
    {
        if($request->file("gambar")) {
            $data = $request->file("gambar")->store("kelas");
        }

        Kelas::create([
            'user_id' => Auth::user()->id,
            'judul' => $request->judul,
            'gambar' =>$data,
            'deskripsi' =>$request->deskripsi,
            'status' =>$request->status,
        ]);
        return redirect('mentor/kelas/kelas')->with('success', 'Berhasil ditambahkan!');

    }

    public function edit($id)
    {
        $kelas = Kelas::where("id", $id)->first();
        return view('mentor/kelas/edit',['item' => $kelas]);

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
