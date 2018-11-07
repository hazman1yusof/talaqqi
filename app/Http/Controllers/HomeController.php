<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ticket;
use App\message;
use Auth;

class HomeController extends Controller
{

    public function home()
    {   
        return view('home');
    }

    public function about()
    {   
        return view('about');
    }

    public function mission()
    {   
        return view('mission');
    }

    public function blog()
    {   
        return view('blog');
    }

    public function contact()
    {   
        return view('contact');
    }
}