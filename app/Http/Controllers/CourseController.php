<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function BrowseCourse()
    {
        return view('member/browse_course');
    }

    public function ClassDetail()
    {
        return view('member/class_detail');
    }

    public function StudentCourse()
    {
        return view('member/student_course');
    }

    public function StudentQuiz()
    {
        return view('member/student_quiz');
    }
}
