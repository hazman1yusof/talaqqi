<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon;
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

    	DB::enableQueryLog();
    	$user = DB::table('users')
    				->where('id','=',$id)
    				->first();

    	$talaqqi = DB::table('talaqqi')
    				->where('user_id','=',$id)
    				->orderBy('adddate', 'desc')
    				->offset($request->offset)
    				->limit($request->limit)
    				->get();
    	// dd($talaqqi);

    	// $talaqqi = DB::table('talaqqi')
    	// 			->where('user_id','=',$id)
    	// 			->orderBy('adddate', 'desc')
    	// 			->paginate(10);


    	// dd(DB::getQueryLog());

        return view('student_detail',compact('user','talaqqi'));
    }

    public function bio(Request $request){
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

    public function talaqqi(Request $request){

    	if($request->oper == 'add'){
	    	DB::table('talaqqi')
	    		->insert([
	    			'user_id' => $request->user_id,
	    			'tajwid' => $request->tajwid,
	    			'tarannum' => $request->tarannum,
	    			'tartil' => $request->tartil,
	    			'kelancaran' => $request->kelancaran,
	    			'overall' => $request->overall,
	    			'komen' => $request->komen,
	    			'ayat' => $request->ayat,
	    			'adddate' => Carbon::now("Asia/Kuala_Lumpur")
	    		]);
    	}


    	return back();
    }
}