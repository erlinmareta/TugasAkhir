<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AkunController extends Controller
{
    public function Akun()
    {
        $user = DB::table('users')->get();
        return view ('admin/akun/user', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id',$id)->get();
        return view('admin/akun/edit',['user' => $user]);

    }

    public function update(Request $request)
    {
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
        return redirect('/admin/akun/user')->with('success', 'Data Berhasil diubah!');
    }

    public function hapus($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }
}
