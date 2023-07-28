<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\User;
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

    // Fetch data based on search query if it exists, otherwise fetch all data
    $kelas = Kelas::with('user')
        ->where('status', 'sukses')
        ->when($searchQuery, function ($query, $searchQuery) {
            return $query->where('judul', 'like', '%' . $searchQuery . '%');
        })
        ->paginate(2);

    	return view('admin/kelas/berhasil' , ['kelas' => $kelas , 'searchQuery' => $searchQuery]);
    }

    public function KelasDitolak()
    {
        $kelas = Kelas::with('user')->where('status' , 'cancel')->get();
    	return view('admin/kelas/ditolak' , ['kelas' => $kelas]);
    }

}
