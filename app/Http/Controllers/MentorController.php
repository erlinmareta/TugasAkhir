<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class MentorController extends Controller
{
    public function index()
    {
        return view ('mentor/dashboard');
    }

    public function InstructorDashboard()
    {
        return view ('mentor/instructor_dashboard');
    }

    public function InstructorCourse()
    {
        return view ('mentor/instructor_course');
    }

    public function EditCourse()
    {
        return view ('mentor/edit_course');
    }

    public function InstructorProfil()
    {
        $user = User::findOrFail(Auth::id());
        return view ('mentor/instructor_profil', compact('user'));
    }

    public function UpdateProfilInstruktur()
    {

    }

    public function InstructorQuiz()
    {
        return view ('mentor/instructor_quiz');
    }

    public function EditQuiz()
    {
        return view ('mentor/edit_quiz');
    }
}
