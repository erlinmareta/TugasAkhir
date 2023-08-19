<?php

namespace App\Http\Middleware;

use Closure;
use Hashids\Hashids;
use App\Models\MentorBerkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekLogin
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->level == 'admin') {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->level == 'mentor') {
                if (request()->routeIs('loginproses')) {
                    $idUser = auth()->user()->id;
                } else {
                    $idUser = $this->hashids->decode(auth()->user()->id)[0];
                }

                $getData = MentorBerkas::query()
                    ->where([
                        ['user_id', '=', $idUser],
                        ['nik', '!=', null],
                        ['file_riwayat_pendidikan', '!=', null],
                        ['file_keahlian_khusus', '!=', null],
                        ['file_prestasi', '!=', null],
                        ['status', '=', 'completed']
                    ])->first();
                if ($getData) {
                    return $next($request);
                } else {
                    return redirect()->route('berkas.index');
                }
            } elseif (Auth::user()->level == 'member') {
                return redirect('member/student_dashboard');
            }
        } else {
            return $next($request);
        }
    }
}
