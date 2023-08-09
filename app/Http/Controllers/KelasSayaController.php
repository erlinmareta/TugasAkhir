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
    public function KelasSaya(Request $request)
    {

        $search = $request->input('search');
        $query = Kelas::where('user_id', Auth::user()->id)->where('status', 'pending');

        if ($search) {
        $query->where('judul', 'like', '%' . $search . '%');
    }

    $kelas = $query->paginate(10);
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

    if ($kelas->status === 'sukses' || $kelas->status === 'proses' || $kelas->materi->count() === 0) {
        return redirect()->back()->with('error', 'Kelas tidak dapat dipublish, lengkapi terlebih dahulu materi pada kelas tersebut');
    }

    $kelas->status = 'proses';
    $kelas->save();

    return redirect()->back()->with('success', 'Kelas berhasil dipublish dan data terkirim ke dashboard admin.');
}

public function Ditolak(Request $request)
{
    $search = $request->input('search');
        $query = Kelas::where('user_id', Auth::user()->id)->where('status', 'cancel');

        if ($search) {
        $query->where('judul', 'like', '%' . $search . '%');
    }

    $kelas = $query->paginate(10);
    return view('mentor/kelas_saya/ditolak', ['kelas' => $kelas , ]);
}

}
