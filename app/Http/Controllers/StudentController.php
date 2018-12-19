<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ticket;
use App\message;
use Auth;
use DB;

class StudentController extends Controller
{

    public function index()
    {   
        return view('student');
    }

    public function detail($id,Request $request)
    {   
    	$user = DB::table('users')
    				->where('id','=',$id)
    				->first();

    	$talaqqi = DB::table('talaqqi')
    				->where('user_id','=',$id)
    				->offset($request->offset)
    				->limit($request->limit)
    				->get();

        return view('student_detail',compact('user','talaqqi'));
    }
}