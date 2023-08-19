<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Hashids\Hashids;
use App\Models\VerifyUser;
use Illuminate\Support\Str;
use App\Models\MentorBerkas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->hashids = new Hashids(env('MY_SECRET_SALT_KEY'), 12, env('MY_ALPHABET_KEY'));
    }

    public function login()
    {
        return view('login');
    }

    public function loginProses(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha',
        ]);
        if (Auth::attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']], $request->has('remember'))) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->route('dashboard.admin');
            } else if ($user->level == 'mentor') {
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
                    return redirect('mentor/dashboard');
                } else {
                    return route('berkas.index');
                }
            } else {
                return redirect('member/student_dashboard');
            }
        } else {
            return redirect()->back()->with(['error' => 'Username atau password salah']);
        }
    }



    public function Reload()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function RegisterUser(Request $request)
    {
        $password = $request->password;

        if (strlen($password) < 8) {
            return redirect()->back()
                ->with(['error' => 'Password yang dimasukkan minimal 8 karakter'])
                ->withInput();
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->level = $request->level;
        $user->password = bcrypt($request->password);
        $save = $user->save();
        $last_id = $this->hashids->decode($user->id)[0];

        $token = $last_id . hash('sha256', \Str::random(120));
        $verifyURL = route('user.verify', ['token' => $token, 'service' => 'Email_verification']);

        VerifyUser::create([
            'user_id' => $last_id,
            'token' => $token,
        ]);

        $message = 'Dear <b>' . $request->name . '</b>';
        $message .= 'Thanks for signing up, we just need you to verify your email address to complete setting up your account.';

        $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => $request->email,
            'fromName' => $request->name,
            'subject' => 'Email Verification',
            'body' => $message,
            'actionLink' => $verifyURL,

        ];

        \Mail::send('email_template', $mail_data, function ($message) use ($mail_data) {
            $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
        });

        if ($save) {
            return redirect()->back()->with('success', 'Kamu perlu melakan verifikasi Email, kami sudah mengirim link verifikasi,
            mohon untuk memeriksa email anda');
        } else {
            return redirect()->back()->with('fail', 'terjadi masalah, tidak dapat melakukan registrasi');
        }
    }

    public function Verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if (!is_null($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->email_verified) {
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('login')->with('success', 'Email berhasil terverifikasi,
                anda bisa login sekarang !')->with('verifiedEmail', $user->email);
            } else {
                return redirect()->route('login')->with('success', 'Email berhasil terverifikasi,
                anda bisa login sekarang !')->with('verifiedEmail', $user->email);
            }
        }
    }

    public function ForgotForm()
    {
        return view('/forgot');
    }

    public function SendLinkForgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = \Str::random(60);
        \DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $action_link = route('reset.password.form', ['token' => $token, 'email' => $request->email]);
        $body = "kami telah menerima request untuk mengubah passsword untuk aplikasi <b> IndLearn </b>
       pada akun terkait " . $request->email . ". kamu bisa mengubah password anda dengan meng klik link ini";

        \Mail::send('email_forgot', ['action_link' => $action_link, 'body' => $body], function ($messege) use ($request) {
            $messege->from('IndLearnku@gmail.com', 'IndLearn');
            $messege->to($request->email, 'name')
                ->subject('Reset Password');
        });

        return back()->with('success', 'Kami telah mengirimkan untuk mengubah password link pada email anda ');
    }

    public function ShowResetForm(Request $request, $token = null)
    {
        return view('/reset_form')->with(['token' => $token, 'email' => $request->email]);
    }

    public function ResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        $check_token = \DB::table('password_resets')->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();

        if (!$check_token) {
            return back()->withInput()->with('fail', 'Invalid token');
        } else {
            User::where('email', $request->email)->update([
                'password' => \Hash::make($request->password)
            ]);

            \DB::table('password_resets')->where([
                'email' => $request->email
            ])->delete();

            return redirect()->route('login')->with('info', 'Password Berhasil di perbarui silahkan Login dengan Password baru');
        }
    }



    public function Logout()
    {
        Auth::Logout();
        return redirect('/');
    }
}
