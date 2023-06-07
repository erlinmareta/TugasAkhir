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

    public function KelasPublish($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->status = 'proses';
        $kelas->save();

        // Lanjutkan dengan logika untuk memindahkan data ke dashboard admin

        return redirect()->back()->with('success', 'Kelas berhasil dipublish dan data terkirim ke dashboard admin.');
    }
}
