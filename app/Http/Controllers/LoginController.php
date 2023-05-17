<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

use App\Models\User;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function LoginProses(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password')))
        {
            if (Auth::user()->level == 'admin') {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->level == 'mentor'){
                return redirect('mentor/instructor_dashboard');
            } else {
                return redirect('member/student_dashboard');
            }
        }
    }

    public function registrasi()
    {
        return view('registrasi');
    }

    public function RegisterUser(Request $request)
    {
       User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'remember_token' => str::random(60),
       ]);

       return redirect ('/login');
    }

    public function Logout(){
        Auth::Logout();
        return redirect('/');
    }
}
