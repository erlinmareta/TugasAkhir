<?php

namespace App\Http\Controllers;

use App\Models\MentorBerkas;
use App\Models\User;
use Hashids\Hashids;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class AkunController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function requirement()
    {
        $getBerkas = MentorBerkas::query()->latest()->get();
        return view('admin.requirement.index', compact('getBerkas'));
    }

    public function requirement_validate()
    {
        try {
            $status = request('status');
            $idUser = request('user');

            $user = User::findOrFail($idUser);
            MentorBerkas::query()
                ->where('user_id', '=', $idUser)
                ->update([
                    'status' => $status
                ]);

            $message = 'Dear <b>' . $user['name'] . '</b>';
            if (request('status') === 'reject') :
                $user->delete();
                $jwbStatus = 'Ditolak';
                $message .= ' Informasi mengenai pengajuan sebagai mentor <b>' . $jwbStatus . '</b>';
            elseif (request('status') === 'completed') :
                $jwbStatus = 'Diterima';
                $message .= ' Informasi mengenai pengajuan sebagai mentor telah <b>' . $jwbStatus . '</b>';
            elseif (request('status') === 'pending') :
                $jwbStatus = 'Menunggu';
                $message .= ' Informasi mengenai pengajuan sebagai mentor berada pada status <b>' . $jwbStatus . '</b>';
            endif;

            $mail_data = [
                'recipient' => $user['email'],
                'fromEmail' => $user['email'],
                'fromName' => $user['name'],
                'subject' => 'Mentor Submission Validation',
                'body' => $message
            ];

            \Mail::send('email_validation_mentor', $mail_data, function ($message) use ($mail_data) {
                $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
            });
            return back()->with('success', 'Data berhasil diubah');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan, data gagal diubah');
        }
    }

    public function Akun(Request $request)
    {
        $searchQuery = $request->input('search');

        $user = User::when($searchQuery, function ($query, $searchQuery) {
            return $query->where('name', 'like', '%' . $searchQuery . '%')
                ->orWhere('email', 'like', '%' . $searchQuery . '%');
        })
            ->paginate(5);
        return view('admin/akun/user', ['user' => $user, 'searchQuery' => $searchQuery]);
    }

    public function edit($id)
    {
        $idUser = $this->hashids->decode($id)[0];
        $user = User::where('id', $idUser)->first();
        return view('admin.akun.edit', ['item' => $user]);
    }

    public function update(Request $request)
    {
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $user = User::whereId($idUser)->first();
        if ($request->hasFile("foto")) {
            Storage::delete($user->foto);
            $data = $request->file("foto")->store("profil");
        } else {
            $data = $user->foto;
        }

        $user->update([
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
        $idUser = $this->hashids->decode($id)[0];
        DB::table('users')->where('id', $idUser)->delete();
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

        return view('admin/akun/mentor', ['user' => $user, 'searchQuery' => $searchQuery, 'pendidikan' => $pendidikan]);
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

        return view('admin/akun/peserta', ['user' => $user, 'searchQuery' => $searchQuery]);
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
        if ($request->file("foto")) {
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
            'foto' => $data,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,

        ]);
        return redirect('admin/akun/admin')->with('success', 'Berhasil ditambahkan!');
    }
}
