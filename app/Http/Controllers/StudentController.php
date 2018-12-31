<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
use Auth;
use DB;
use Storage;
use Image;
use File;

class StudentController extends Controller
{

    public function index()
    {   

        DB::enableQueryLog();
        $student = DB::table('users')
                        ->where('users.role','=','student')
                        ->orderBy('users.id', 'desc');

        $paginate = $student->paginate();

        $paginate->getCollection()->transform(function ($value) {
            // Your code here
            dump($value);
            return $value;
        });

        $student = $student->get();
        // dd($paginate->getCollection());

        return view('student');
    }

}