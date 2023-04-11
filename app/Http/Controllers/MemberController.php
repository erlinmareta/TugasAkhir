<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        return view ('member/dashboard');
    }

    public function MentorProfil()
    {
        return view ('member/mentor_profil');
    }



    public function StudentDashboard()
    {
        return view ('member/student_dashboard');
    }

    public function StudentProfil()
    {
        $user = User::findOrFail(Auth::id());
        return view ('member/student_profil', compact('user'));
    }

    public function Update(Request $request , $id)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required',
            'foto' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
            'deskripsi' => 'required',
           ]);

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->tempat_lahir = $request->tempat_lahir;
            $user->jenis_kelamin = $request->jenis_kelamin;
            $user->tanggal_lahir = $request->tanggal_lahir;
            $user->nomor_telepon = $request->nomor_telepon;
            $user->alamat = $request->alamat;
            $user->pekerjaan = $request->pekerjaan;
            $deskripsi = $request->deskripsi;

            if(request()->hasFile('foto')) {
                if($user->foto && file_exists(storage_path('app/public/photo/' . $user->foto))){
                    Storage::delete('app/public/photo/'.$user->foto);
                }

                $file = $request->file('foto');
                $fileName = $file->hashName() . '.' . $file->getClientOriginalExtension();
                $request->foto->move(storage_path('app/public/photo'), $fileName);
                //foto yang sudah diupload akan masuk ke folder storage/public/photos
                $user->foto = $fileName;
            }

            $user->save();

            return redirect('member/student_profil');

    }

    public function UpdateProfile(Request $request)
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
            "foto" => $request->foto->hashName(),
        ]);
        $foto = $request->file('foto');
        $foto->storeAs('public/profile', $foto->hashName());




        // User::where('id', Auth::user()->id)->update([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "tempat_lahir" => $request->tempat_lahir,
        //     "jenis_kelamin" => $request->jenis_kelamin,
        //     "tanggal_lahir" => $request->tanggal_lahir,
        //     "nomor_telepon" => $request->nomor_telepon,
        //     "alamat" => $request->alamat,
        //     "pekerjaan" => $request->pekerjaan,
        //     "deskripsi" => $request->deskripsi,
        //     "foto" => $request->foto,
        // ]);


        return back();
    }


}
