<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\VerifyUser;

class LoginController extends Controller
{
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
            return redirect('admin/dashboard');
        } else if ($user->level == 'mentor') {
            return redirect('mentor/dashboard');
        } else {
            return redirect('member/student_dashboard');
        }
    } else {
        return redirect()->back()->with(['error' => 'Username atau password salah']);
    }
}



    public function Reload()
    {
        return response()->json(['captcha'=>captcha_img()]);
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
        $last_id = $user->id;

        $token = $last_id.hash('sha256', \Str::random(120));
        $verifyURL = route('user.verify', ['token'=>$token, 'service'=>'Email_verification' ]);

        VerifyUser::create([
            'user_id'=>$last_id,
            'token' => $token,
        ]);

        $message = 'Dear <b>'.$request->name.'</b>';
        $message.= 'Thanks for signing up, we just need you to verify your email address to complete setting up your account.';

        $mail_data = [
            'recipient' => $request->email,
            'fromEmail' => $request->email,
            'fromName' => $request->name,
            'subject' =>'Email Verification',
            'body' => $message,
            'actionLink' => $verifyURL,

        ];

        \Mail::send('email_template', $mail_data, function($message) use ($mail_data){
            $message->to($mail_data['recipient'])
                    ->from($mail_data['fromEmail'], $mail_data['fromName'])
                    ->subject($mail_data['subject']);
        });

        if($save){
            return redirect()->back()->with('success', 'you need to verify your account, we have sent you an activation
            link, please check your email');
        }else{
            return redirect()->back()->with('fail', 'something went wrong, failed register');
        }

        // return redirect('/login');
    }

    public function Verify(Request $request)
    {
        $token = $request->token;
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(!is_null($verifyUser)){
            $user = $verifyUser->user;

            if(!$user->email_verified){
                $verifyUser->user->email_verified = 1;
                $verifyUser->user->save();

                return redirect()->route('login')->with('success', 'Email berhasil terverifikasi,
                anda bisa login sekarang !')->with('verifiedEmail', $user->email);

            }else{
                return redirect()->route('/login')->with('success', 'Email berhasil terverifikasi,
                anda bisa login sekarang !')->with('verifiedEmail', $user->email);;
            }
        }
    }


    public function Logout()
    {
        Auth::Logout();
        return redirect('/');
    }
}
