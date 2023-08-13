<?php

namespace App\Http\Controllers;

use Hashids\Hashids;
use App\Models\Kelas;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KelasSayaController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function KelasSaya(Request $request)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $search = $request->input('search');
        $query = Kelas::where('user_id', $idUser)->where('status', 'pending');

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $kelas = $query->paginate(10);
        return view('mentor/Kelas_saya/kelas_saya', ['kelas' => $kelas]);
    }

    public function DetailKelas($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::findOrFail($idKelas);
        $materi = Materi::where('kelas_id', $idKelas)->orderBy('urutan')->get();
        return view('mentor/kelas_saya/detail', ['materi' => $materi]);
    }

    public function KelasPublish($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::findOrFail($idKelas);

        $materiKelas = Materi::where('kelas_id',$idKelas)->get();
        if ($kelas->status === 'sukses' || $kelas->status === 'proses' || $materiKelas->isEmpty()) {
            return redirect()->back()->with('error', 'Kelas tidak dapat dipublish, lengkapi terlebih dahulu materi pada kelas tersebut');
        }

        $kelas->status = 'proses';
        $kelas->save();

        return redirect()->back()->with('success', 'Kelas berhasil dipublish dan data terkirim ke dashboard admin.');
    }

    public function Ditolak(Request $request)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $search = $request->input('search');
        $query = Kelas::where('user_id', $idUser)->where('status', 'cancel');

        if ($search) {
            $query->where('judul', 'like', '%' . $search . '%');
        }

        $kelas = $query->paginate(10);
        return view('mentor/kelas_saya/ditolak', ['kelas' => $kelas,]);
    }
}
