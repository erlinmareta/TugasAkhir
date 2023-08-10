<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function Kategori()
    {
        $kategori = Kategori::get();
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
        // decode
        $idKategori = $this->hashids->decode($id)[0];
        $kategori = Kategori::where("id", $idKategori)->first();
        return view('admin/kategori/edit', ['item' => $kategori]);
    }

    public function update(Request $request, $id)
    {
        // decode
        $idKategori = $this->hashids->decode($id)[0];
        Kategori::where("id", $idKategori)->update([
            'nama' => $request->nama,
        ]);

        return redirect('admin/kategori/kategori')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function Delete($id)
    {
        // decode
        $idKategori = $this->hashids->decode($id)[0];
        DB::table('kategori')->where('id', $idKategori)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }
}
