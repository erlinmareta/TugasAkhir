<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hashids\Hashids;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\MentorBerkas;
use App\Models\Pendidikan;
use App\Models\Subscription;
use Hamcrest\Type\IsNumeric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function berkas()
    {
        // cek berkas
        if (request()->routeIs('loginproses')) {
            $idUser = auth()->user()->id;
        } else {
            $idUser = $this->hashids->decode(auth()->user()->id)[0];
        }
        $getBerkas = MentorBerkas::query()
            ->where([
                ['user_id', '=', $idUser],
                ['nik', '!=', null],
                ['file_riwayat_pendidikan', '!=', null],
                ['file_keahlian_khusus', '!=', null],
                ['file_prestasi', '!=', null]
            ])
            ->first();
        $getBerkasCompleted = MentorBerkas::query()
            ->where([
                ['user_id', '=', $idUser],
                ['nik', '!=', null],
                ['file_riwayat_pendidikan', '!=', null],
                ['file_keahlian_khusus', '!=', null],
                ['file_prestasi', '!=', null],
                ['status', '=', 'completed'],
            ])
            ->exists();
        if ($getBerkasCompleted) {
            return redirect('mentor/dashboard');
        }
        return view('mentor.requirement.index', compact('getBerkas'));
    }

    public function berkas_store(Request $request)
    {
        $message = [
            'required' => 'Kolom tidak boleh kosong',
            'file_riwayat_pendidikan.max' => 'Maksimal 2mb',
            'file_keahilan_khusus.max' => 'Maksimal 2mb',
            'file_prestasi.max' => 'Maksimal 2mb',
            'nik.max' => 'Maksimal 16 Karaketer',
            'nik.min' => 'Minimal 16 Karakter',
            'mimes' => 'Hanya diperbolehkan :values'
        ];
        $validated = $request->validate([
            'nik' => 'required|min:16|numeric|unique:mentor_berkas,nik',
            'file_riwayat_pendidikan' => 'required|mimes:png,jpg,pdf,jpeg,jfif|max:2048',
            'file_keahilan_khusus' => 'required|mimes:png,jpg,pdf,jpeg,jfif|max:2048',
            'file_prestasi' => 'required|mimes:png,jpg,pdf,jpeg,jfif|max:2048',
            'user_id' => '',
        ], $message);

        if (!is_numeric($validated['nik'])) {
            return back()->with('error', 'NIK harus berupa angka');
        }
        try {
            if ($request->hasFile('file_riwayat_pendidikan') && $request->hasFile('file_keahilan_khusus') && $request->hasFile('file_prestasi')) {
                // store local
                $validated['file_riwayat_pendidikan'] = $request->file('file_riwayat_pendidikan')->store('berkas_riwayat_pendidikan');
                $validated['file_keahilan_khusus'] = $request->file('file_keahilan_khusus')->store('berkas_keahilan_khusus');
                $validated['file_prestasi'] = $request->file('file_prestasi')->store('berkas_file_prestasi');
            }
            $idUser = $this->hashids->decode(auth()->user()->id)[0];

            $validated['user_id'] = $idUser;
            MentorBerkas::query()
                ->create($validated);
            return back()->with('success', 'Berhasil menyimpan berkas');
        } catch (\Throwable $th) {
            return back()->with('error', 'Terjadi kesalahan dalam menyimpan berkas');
        }
    }

    public function MentorDashboard()
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $user = User::where('level', 'member')->where('id', $idUser)->count();
        $kelas = Kelas::where('user_id', $idUser)->count();
        $materi = Materi::where('user_id', $idUser)->count();
        $kelasberhasil = Kelas::where('status', 'sukses')->where('user_id', $idUser)->count();
        $totalstudent = Kelas::select(DB::raw('count(distinct subscription.user_id) as total_student'))
            ->join('users', 'users.id', '=', 'kelas.user_id') //join get id mentor
            ->join('subscription', 'subscription.kelas_id', '=', 'kelas.id')
            ->where('kelas.user_id', $idUser)
            ->groupBy('kelas.id', 'name')
            ->count();
        $infomember = Kelas::select('kelas.id AS mentor', 'users.name', 'kelas.judul', 'subscription.created_at AS created_at')
            ->join('subscription', 'subscription.kelas_id', '=', 'kelas.id')
            ->join('users', 'users.id', '=', 'subscription.user_id')
            ->where('kelas.user_id', $idUser)
            ->get();

        $kelasCounts = Kelas::select('kelas.judul AS label', DB::raw('count(distinct subscription.user_id) as data'))
            ->join('subscription', 'subscription.kelas_id', '=', 'kelas.id')
            ->where('kelas.user_id', $idUser)
            ->groupBy('kelas.id', 'kelas.judul')
            ->orderByDesc('data')
            ->take(5) // Ambil 5 kelas terbanyak
            ->get();

        // Proses data untuk dikirim ke view
        $labels = $kelasCounts->pluck('label')->toArray();
        $data = $kelasCounts->pluck('data')->toArray();

        $kelasCounts = [
            'labels' => $labels,
            'data' => $data,
        ];

        return view('mentor/dashboard', compact(
            'user',
            'kelas',
            'materi',
            'kelasberhasil',
            'totalstudent',
            'infomember',
            'kelasCounts'
        ));
    }

    public function ProfileMentor()
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $user = User::findOrFail($idUser);
        return view('mentor/profil/profil', compact('user'));
    }

    public function UpdateProfil(Request $request)
    {
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
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $user = User::where('id', $idUser)->update([
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

        return back();
    }

    public function Signature(Request $request)
    {
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $user = User::query()->findOrFail($idUser);

        if ($user !== NULL) {
            $dataURL = $request->input('signature');
            $imageName = time() . '.png'; // Nama file gambar dengan timestamp untuk menghindari nama yang sama
            $path = public_path('storage/signature/' . $imageName);
            // Menghapus header yang digenerate oleh metode toDataURL()
            $dataURL = str_replace('data:image/png;base64,', '', $dataURL);
            $dataURL = str_replace(' ', '+', $dataURL);

            // Simpan gambar ke server
            file_put_contents($path, base64_decode($dataURL));
            if ($user['signature']) {
                Storage::delete($user['signature']);
            }
            User::query()
                ->findOrFail($idUser)
                ->update([
                    'signature' => 'signature/' . $imageName
                ]);
            return response()->json(['message' => 'Tanda tangan berhasil disimpan'], 200);
        } else {
            return response()->json(['message' => 'Harap mengisi berkas terlebih dahulu sebelum melakukan tanda tangan'], 500);
        }
    }

    public function DataMember(Request $request)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $search = $request->input('search');
        $student = Kelas::select(
            'kelas.id AS mentor',
            'users.name',
            'users.email',
            'users.nomor_telepon',
            'kelas.judul',
            'subscription.created_at AS created_at'
        )
            ->join('subscription', 'subscription.kelas_id', '=', 'kelas.id')
            ->join('users', 'users.id', '=', 'subscription.user_id')
            ->where('kelas.user_id', $idUser)
            ->when($search, function ($query, $search) {
                return $query->where('users.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('kelas.judul', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10);
        return view('mentor/member/member', compact('student'));
    }

    public function MemberKelas(Request $request)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $search = $request->input('search');
        $query = Kelas::where('user_id', $idUser)
            ->where('status', 'sukses');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', '%' . $search . '%');
            });
        }

        $data['kelas'] = $query->paginate(10);
        return view('mentor/member/member_kelas', $data);
    }

    public function Student($id_kelas)
    {
        // decode
        $idKelas = $this->hashids->decode($id_kelas)[0];

        $data['subscription'] = Subscription::where('kelas_id', $idKelas)->paginate(10);
        return view('mentor/member/student', $data);
    }

    public function Pendidikan()
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];

        $pendidikan = Pendidikan::firstOrCreate(['user_id' => $idUser]);
        return view('mentor/pendidikan/pendidikan', compact('pendidikan'));
    }

    public function StorePendidikan(Request $request)
    {
        // decode
        $idUser = $this->hashids->decode(Auth::user()->id)[0];
        $user_id = $idUser;

        $pendidikan = Pendidikan::where('user_id', $user_id)->first();

        if (!$pendidikan) {
            // If the educational history does not exist, create a new one
            $pendidikan = new Pendidikan();
            $pendidikan->user_id = $user_id;
        }

        // Update the educational history with the new data
        $pendidikan->sd = $request->input('sd');
        $pendidikan->smp = $request->input('smp');
        $pendidikan->sma = $request->input('sma');
        $pendidikan->d1 = $request->input('d1');
        $pendidikan->d2 = $request->input('d2');
        $pendidikan->d3 = $request->input('d3');
        $pendidikan->d4 = $request->input('d4');
        $pendidikan->s2 = $request->input('s2');
        $pendidikan->s3 = $request->input('s3');

        $pendidikan->save();

        return back();
    }

    public function ResetPassword()
    {
        return view('mentor/reset_password');
    }

    public function NewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);
        // decode

        $user = Auth::user();

        // Verifikasi email
        if ($request->email !== $user->email) {
            return redirect()->back()->with('error', 'Email tidak cocok.');
        }

        // Verifikasi password lama
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak cocok.');
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah.');
    }
}
