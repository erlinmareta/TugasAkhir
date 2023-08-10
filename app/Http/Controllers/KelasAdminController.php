<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hashids\Hashids;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Rating;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class KelasAdminController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function index()
    {
        $kelas = Kelas::where('status', 'proses')->get();
        return view('admin/kelas/index', ['kelas' => $kelas]);
    }

    public function Detail($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::findOrFail($idKelas);
        $materi = $kelas->materi()->orderBy('urutan')->get();
        return view('admin/kelas/detail', ['materi' => $materi]);
    }

    public function KelasPublish($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::findOrFail($idKelas);
        $kelas->status = 'sukses';
        $kelas->save();

        return redirect()->back()->with('success', 'Kelas berhasil dipublish.');
    }

    public function HapusKelas($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        Kelas::find($idKelas)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }

    public function Reject(Request $request, $id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::findOrFail($idKelas);
        $kelas->status = 'cancel';
        $kelas->alasan = $request->alasan;
        $kelas->save();
        return redirect()->back();
    }

    public function KelasBerhasil(Request $request)
    {
        $searchQuery = $request->input('search');

        $kelas = Kelas::where('status', 'sukses')
            ->when($searchQuery, function ($query, $searchQuery) {
                return $query->where('judul', 'like', '%' . $searchQuery . '%');
            })
            ->paginate(10);
        return view('admin/kelas/berhasil', ['kelas' => $kelas, 'searchQuery' => $searchQuery]);
    }

    public function KelasDitolak(Request $request)
    {
        $searchQuery = $request->input('search');

        $kelas = Kelas::where('status', 'cancel')
            ->when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('nama_kelas', 'LIKE', '%' . $searchQuery . '%');
            })
            ->paginate(10);

        return view('admin/kelas/ditolak', ['kelas' => $kelas, 'searchQuery' => $searchQuery]);
    }

    public function Info($id)
    {
        // decode
        $idKelas = $this->hashids->decode($id)[0];
        $kelas = Kelas::find($idKelas);
        $subscription = Subscription::where('kelas_id', $idKelas)->first();
        $rating = Rating::where('kelas_id', $idKelas)->paginate(10);
        return view('admin/kelas/info', ['kelas' => $kelas, 'subscription' => $subscription, 'rating' => $rating]);
    }
}
