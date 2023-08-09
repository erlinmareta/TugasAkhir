<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pendidikan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class AkunController extends Controller
{
    public function Akun(Request $request)
    {
        $searchQuery = $request->input('search');

        $user = DB::table('users')
        ->when($searchQuery, function ($query, $searchQuery) {
            return $query->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })
        ->paginate(5);
        return view ('admin/akun/user', ['user' => $user, 'searchQuery' => $searchQuery]);
    }

    public function edit($id)
{
    $user = DB::table('users')->where('id', $id)->first();
    return view('admin.akun.edit', ['item' => $user]);
}

    public function update(Request $request)
    {
        if($request->file("foto")) {
            $data = $request->file("foto")->store("profil");
        }
        $user = User::where('id', Auth::user()->id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "level" => $request->level,
            "password" => $request->password,
            "tempat_lahir" => $request->tempat_lahir,
            "jenis_kelamin" => $request->jenis_kelamin,
            "tanggal_lahir" => $request->tanggal_lahir,
            "nomor_telepon" => $request->nomor_telepon,
            "alamat" => $request->alamat,
            "pekerjaan" => $request->pekerjaan,
            "deskripsi" => $request->deskripsi,
            "foto" => $data
        ]);
        return redirect('/admin/akun/admin')->with('success', 'Data Berhasil diubah!');
    }

        public function hapus($id)
        {
            DB::table('users')->where('id',$id)->delete();
            return back()->with('success', 'Data Berhasil dihapus!');
        }

        public function DataMentor(Request $request)
        {
            $searchQuery = $request->input('search');

            $user = User::when($searchQuery, function ($query) use ($searchQuery) {
                return $query->where('level', 'mentor')
                             ->where(function ($query) use ($searchQuery) {
                                 $query->where('name', 'like', '%' . $searchQuery . '%')
                                       ->orWhere('email', 'like', '%' . $searchQuery . '%');
                             });
            })
            ->where('level', 'mentor')
            ->paginate(10);

            $userIds = $user->pluck('id');

            // Load the 'pendidikan' relationship for the retrieved user IDs
            $pendidikan = Pendidikan::whereIn('user_id', $userIds)->get()->groupBy('user_id');


            return view('admin/akun/mentor', ['user' => $user, 'searchQuery' => $searchQuery , 'pendidikan' => $pendidikan]);
        }


        public function DataPeserta(Request $request)
        {
            $searchQuery = $request->input('search');

            $user = User::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('level', 'member')
                         ->where(function ($query) use ($searchQuery) {
                             $query->where('name', 'like', '%' . $searchQuery . '%')
                                   ->orWhere('email', 'like', '%' . $searchQuery . '%');
                         });
        })
        ->where('level', 'member')
        ->paginate(10);

            return view('admin/akun/peserta', ['user' => $user , 'searchQuery' => $searchQuery]);
        }

        public function DataAdmin(Request $request)
        {
            $user = User::where("level", "admin")->get();
            return view('admin/akun/admin', ['user' => $user]);
        }

        public function TambahAdmin()
        {
            return view('admin/akun/tambah');
        }

        public function store(Request $request)
    {
        $data = null;
        if($request->file("foto")) {
            $data = $request->file("foto")->store("profil");
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'level' => $request->level,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nomor_telepon' => $request->nomor_telepon,
            'foto' =>$data,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'deskripsi' =>$request->deskripsi,

        ]);
        return redirect('admin/akun/admin')->with('success', 'Berhasil ditambahkan!');

    }


}
