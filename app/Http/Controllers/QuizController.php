<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function TakeQuiz()
    {
        return view('member/quis_student');
    }
}
