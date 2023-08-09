<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Ketentuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index()
    {
        $userpeserta = User::where('level', 'member')->count();
        $usermentor = User::where('level', 'mentor')->count();
        $useradmin = User::where('level', 'admin')->count();
        $totaluser = User::count();

        $totalDataKelasmasukPerHari = Kelas::where('status', 'proses')
                                           ->whereDate('created_at', now()->format('Y-m-d'))
                                           ->count();

        $kelasberhasil = Kelas::where('status', 'sukses')->count();
        $info = User::where('level', '!=', 'admin')->latest()->paginate(4);
        $allUsers = User::where('level', '!=', 'admin')->get();
        $infokelasToday = Kelas::whereDate('created_at', now()->format('Y-m-d'))
                                ->where('status', '!=', 'pending')
                                ->get();


    	return view('admin/dashboard', compact('userpeserta', 'usermentor', 'useradmin', 'totaluser',
        'totalDataKelasmasukPerHari', 'kelasberhasil', 'info', 'allUsers', 'infokelasToday'));
    }

    public function Profil()
    {
        return view('admin/profil_admin');
    }

    public function ProfilUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tempat_lahir' => 'required|string',
            'jenis_kelamin' =>'required',
            'tanggal_lahir' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:20',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',


        ]);
        $cek = $request->foto;

        if (empty($cek)) {
            if (empty($request->gambarLama)) {
                $foto = null;
            } else {
                $foto = $request->gambarLama;
            }
        } else {
            if ($request->file("foto")) {
                if ($request->gambarLama) {
                    Storage::delete($request->gambarLama);
                }
                $foto = $request->file("foto")->store("profil");
            } else {
                $foto = $request->gambarLama;
            }
        }

        $user = User::where('id', Auth::user()->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "tempat_lahir" => $request->tempat_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "nomor_telepon" => $request->nomor_telepon,
            "alamat" => $request->alamat,
            "pekerjaan" => $request->pekerjaan,
            "deskripsi" => $request->deskripsi,
            "foto" => $foto
        ]);

        return back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function SyaratdanKetentuan()
    {
        $ketentuan = DB::table('ketentuan')->get();
        return view('admin/s&k/s&k', ['ketentuan'=> $ketentuan]);
    }

    public function AddSyaratdanKetentuan()
    {
        return view('admin/s&k/tambah');
    }

    public function store(Request $request)
    {

        Ketentuan::create([
            'keterangan' => $request->keterangan,

        ]);
        return redirect('admin/s&k/s&k')->with('success', 'Berhasil ditambahkan!');

    }

    public function editKetentuan($id)
    {
        $ketentuan = Ketentuan::where("id", $id)->first();
        return view('admin/s&k/edit', ['item' => $ketentuan]);
    }

    public function updateKetentuan(Request $request, $id)
    {

        Ketentuan::where("id", $id)->update([
            'keterangan' => $request->keterangan,
        ]);

        return redirect('admin/s&k/s&k')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function DeleteKetentuan($id)
    {
        DB::table('ketentuan')->where('id',$id)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }



}
