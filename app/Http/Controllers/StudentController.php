<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ticket;
use App\message;
use Auth;

class StudentController extends Controller
{

    public function index()
    {   
        return view('student');
    }

    public function detail()
    {   
        return view('student_detail');
    }
}