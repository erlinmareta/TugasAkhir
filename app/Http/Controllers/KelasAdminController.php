<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class KelasAdminController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('user')->where('status' , 'proses')->get();
    	return view('admin/kelas/index' , ['kelas' => $kelas]);
    }

    public function Detail($id)
    {
    	$kelas = Kelas::findOrFail($id);
        $materi = $kelas->materi()->orderBy('urutan')->get();
        return view('admin/kelas/detail' , ['materi' => $materi]);
    }

    public function KelasPublish($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->status = 'sukses';
        $kelas->save();

    return redirect()->back()->with('success', 'Kelas berhasil dipublish.');
    }

    public function HapusKelas($id)
    {
        Kelas::find($id)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }

    public function Reject(Request $request , $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->status = 'cancel';
        $kelas->alasan = $request->alasan;
        $kelas->save();
        return redirect()->back();
    }

    public function KelasBerhasil(Request $request)
{
    $searchQuery = $request->input('search');

    $kelas = Kelas::with('user')
        ->where('status', 'sukses')
        ->when($searchQuery, function ($query, $searchQuery) {
            return $query->where('judul', 'like', '%' . $searchQuery . '%');
        })
        ->paginate(10);

    	return view('admin/kelas/berhasil' , ['kelas' => $kelas , 'searchQuery' => $searchQuery]);
    }

    public function KelasDitolak(Request $request)
{
    $searchQuery = $request->input('search');

    $kelas = Kelas::with('user')
                ->where('status', 'cancel')
                ->when($searchQuery, function ($query) use ($searchQuery) {
                    return $query->where('nama_kelas', 'LIKE', '%' . $searchQuery . '%');
                })
                ->paginate(10);

    return view('admin/kelas/ditolak', ['kelas' => $kelas, 'searchQuery' => $searchQuery]);
}

    public function Info($id)
    {
        $kelas = Kelas::find($id);
        $subscription = Subscription::where('kelas_id', $id)->first();
        $rating = Rating::where('kelas_id', $id)->paginate(10);
        return view('admin/kelas/info' , ['kelas' => $kelas , 'subscription' => $subscription , 'rating' => $rating]);
    }

}
