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

    public function form(Request $request){
    	// dd($request);

    	//save changes
    	DB::table('users')
    		->where('id','=',$request->id)
    		->update([
    			'username' => $request->username,
    			'firstname' => $request->firstname,
    			'lastname' => $request->lastname,
    			'bio' => $request->bio,
    			'facebook' => $request->facebook,
    			'twitter' => $request->twitter,
    			'whatsapp' => $request->whatsapp,
    			'instagram' => $request->instagram,
    			'gender' => $request->gender,
    			'marital' => $request->marital,
    			'address' => $request->address,
    			'postcode' => $request->postcode,
    			'state' => $request->state
    		]);

    	return back();
    }
}