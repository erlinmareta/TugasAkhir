<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function CourseDetail()
    {
        return view('member/course_detail');
    }
}
