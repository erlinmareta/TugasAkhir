<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function Home()
    {
        $kategori = Kategori::all();
		$kelas = Kelas::all();
        $user = User::all();
        $materi = Materi::all();
        return view('welcome' , ['kelas' => $kelas, 'kategori' => $kategori, 'user' =>$user, 'materi' =>$materi]);
    }
}
