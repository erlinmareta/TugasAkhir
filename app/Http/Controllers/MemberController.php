<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function StudentProfil()
    {
        return view ('member/student_profil');
    }

    public function StudentDashboard()
    {
        return view ('member/student_dashboard');
    }
}
