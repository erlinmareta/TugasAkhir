<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function Kategori()
    {
        $kategori = DB::table('kategori')->get();
        return view('admin/kategori/kategori', ['kategori' => $kategori]);
    }

    public function TambahKategori()
    {
        return view('admin/kategori/tambah');
    }

    public function store(Request $request)
    {

        Kategori::create([
            'nama' => $request->nama,

        ]);
        return redirect('admin/kategori/kategori')->with('success', 'Berhasil ditambahkan!');

    }

    public function edit($id)
    {
        $kategori = Kategori::where("id", $id)->first();
        return view('admin/kategori/edit',['item' => $kategori]);

    }

    public function update(Request $request, $id)
    {

        Kategori::where("id", $id)->update([
            'nama' => $request->nama,
        ]);

        return redirect('admin/kategori/kategori')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function Delete($id)
    {
        DB::table('kategori')->where('id',$id)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }
}
