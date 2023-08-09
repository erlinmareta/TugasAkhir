<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Materi;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function Home(Request $request)
    {
        // dd($kelas);
        $kategori = Kategori::all();
        $kelas = Kelas::where('status', 'sukses')->get();
        $user = User::all();
        $materi = Materi::all()->first();

        $history = [];

        if (!empty(Auth::user())) {
            $history = History::where("user_id", Auth::user()->id)->pluck("materi_id")->toArray();
        }

        $searchResults = [];

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        // Ganti 'nama_field' dengan nama field yang ingin Anda cari dalam model Materi
        $searchResults = Kelas::where('judul', 'LIKE', '%' . $searchTerm . '%')->get();
    }



        return view('welcome', ['kelas' => $kelas, 'kategori' => $kategori, 'user' => $user, 'materi' => $materi, "history" => $history,
                                'searchResults' => $searchResults]);


    }
}
