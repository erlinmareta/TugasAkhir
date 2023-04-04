<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view ('mentor/instructor_profil');
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
