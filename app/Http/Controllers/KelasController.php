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


    // public function AddMateri($id)
    // {
        //     $kelas = Kelas::where("id", $id)->first();
        //     $materi = Materi::all();
        //     return view('mentor/kelas/add_materi', ['kelas' => $kelas]);
        // }


        public function StoreMateri(Request $request, $id)
        {
            $kelas_id = $id; // Tambahkan baris ini untuk memberikan nilai $id ke $kelas_id.

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
                'judul' => $request->judul,
                'isi_materi' => $videoPath,
                'deskripsi' => $request->deskripsi,
                'urutan' => $request->urutan,
            ]);

            // return redirect('mentor/kelas/detail')->with('success', 'Berhasil ditambahkan!');
            return view('mentor/kelas/detail', ['materi' => $materi]);
        }

        // public function StoreMateri(Request $request, $id)
        // {

            //     $videoPath = null;

            //     if ($request->hasFile('isi_materi')) {
                //         $video = $request->file('isi_materi');
                //         $videoPath = $video->store('materi');
                //     }
                //     Materi::create([
                    //         'user_id' => Auth::user()->id,
                    //         'kelas_id' => $kelas_id,
                    //         'judul' => $request->judul,
                    //         'isi_materi' => $videoPath,
                    //         'deskripsi' =>$request->deskripsi,
                    //         'urutan' =>$request->urutan,
                    //     ]);
                    //     return redirect('mentor/kelas/detail')->with('success', 'Berhasil ditambahkan!');

                    // }

                    public function detail($id)
                    {
                        $kelas = Kelas::findOrFail($id);
                        $materi = $kelas->materi()->orderBy('urutan')->get();
                        return view('mentor/kelas/detail', ['materi' => $materi]);
                    }



                }
