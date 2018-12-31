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

class StudentDetailController extends Controller
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
    				->paginate(10);

        return view('student_detail',compact('user','talaqqi'));
    }

    public function bio(Request $request){


        $bio = DB::table('users')->where('id','=',$request->id);

    	if(!empty($request->file('image_file'))){
			File::delete('uploads/'.$bio->first()->image_path);
    		$image_path = $request->file('image_file')->store('image', 'public_uploads');

    	}else{
    		$image_path = $bio->first()->image_path;

    	}

    	//save changes
    	$bio->update([
    			'username' => $request->username,
    			'firstname' => $request->firstname,
    			'lastname' => $request->lastname,
    			'image_path' => $image_path,
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

            $overall = round(($request->tajwid+$request->tarannum+$request->kefasihan+$request->kelancaran)/4, 2);

	    	DB::table('talaqqi')
	    		->insert([
	    			'user_id' => $request->user_id,
	    			'tajwid' => $request->tajwid,
	    			'tarannum' => $request->tarannum,
	    			'kefasihan' => $request->kefasihan,
	    			'kelancaran' => $request->kelancaran,
	    			'overall' => $overall,
	    			'komen' => $request->komen,
	    			'ayat' => $request->ayat,
	    			'adddate' => Carbon::now("Asia/Kuala_Lumpur")
	    		]);
    	}else if($request->oper == 'edit'){
            $overall = round(($request->tajwid+$request->tarannum+$request->kefasihan+$request->kelancaran)/4, 2);

            DB::table('talaqqi')
                ->where('id','=',$request->id)
                ->update([
                    'tajwid' => $request->tajwid,
                    'tarannum' => $request->tarannum,
                    'kefasihan' => $request->kefasihan,
                    'kelancaran' => $request->kelancaran,
                    'overall' => $overall,
                    'komen' => $request->komen,
                    'ayat' => $request->ayat
                ]);

        }else if($request->oper == 'del'){
            DB::table('talaqqi')
                ->where('id','=',$request->id)
                ->delete();
        }


    	return back();
    }
}