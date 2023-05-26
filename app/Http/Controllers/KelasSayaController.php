<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelasSayaController extends Controller
{
    public function KelasSaya()
    {
        $kelas = DB::table('kelas')->get();
        return view ('mentor/Kelas_saya/kelas_saya' , ['kelas' => $kelas]);
    }

public function DetailKelas($id)
    {
        $kelas = Kelas::findOrFail($id);
        $materi = $kelas->materi()->orderBy('urutan')->get();
        return view('mentor/kelas_saya/detail', ['materi' => $materi]);
    }
}
