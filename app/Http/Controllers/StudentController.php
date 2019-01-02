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
        $students = DB::table('users')
                        ->where('users.role','=','student')
                        ->orderBy('users.id', 'desc')->paginate(16);

        $students->getCollection()->transform(function ($value) {
            $talaqqi = DB::table('talaqqi')
                        ->select('overall')
                        ->where('user_id','=',$value->id)
                        ->orderBy('id', 'desc')
                        ->skip(0)
                        ->take(7)
                        ->get()->toArray();
            $value->talaqqi = $talaqqi;
            return $value;
        });
        // dd($students->getCollection());

        return view('student',compact('students'));
    }

}