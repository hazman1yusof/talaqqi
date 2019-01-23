<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
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

    public function donate()
    {   
        return view('donate');
    }

    public function contact()
    {   
        return view('contact');
    }
}
