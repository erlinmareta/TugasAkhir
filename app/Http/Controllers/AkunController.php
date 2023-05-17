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

    public function tambahAkun()
    {
        return view('admin/akun/tambah');
    }
}
