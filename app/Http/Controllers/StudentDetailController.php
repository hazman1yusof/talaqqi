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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){   
        return view('student');
    }

    public function detail($id,Request $request){   

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

    public function password(Request $request){

        $exists = DB::table('users')->where('id','=',$request->user_id)
                    ->where('password','=',$request->oldpass)
                    ->exists();

        if($exists){
            DB::table('users')->where('id','=',$request->user_id)
                ->update([
                    'password' => $request->newpass
                ]);
        }else{
            return back()->withErrors(['Old Password Incorrect', 'Old Password Incorrect']);
            
        }

        return back()->with('success', 'Password saved!');
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

            DB::table('users')
                ->where('id','=',$request->user_id)
                ->update([
                    'level' => $request->level
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

            DB::table('users')
                ->where('id','=',$request->user_id)
                ->update([
                    'level' => $request->level
                ]);

        }else if($request->oper == 'del'){
            DB::table('talaqqi')
                ->where('id','=',$request->id)
                ->delete();
        }

    	return back();
    }

    public function student_li(Request $request){

        $newarr = [
            "li_1" => 0,
            "li_2" => 0,
            "li_3" => 0,
            "li_4" => 0,
            "li_5" => 0,
            "li2_1" => 0,
            "li2_2" => 0,
            "li2_3" => 0,
            "li2_4" => 0,
            "li2_5" => 0,
        ];

        foreach ($request->post() as $key => $value) {
            if(substr( $key, 0, 2 ) === "li"){
                $newarr = array_merge($newarr, [$key=>$value]);
            }
        }

        DB::table('users')
            ->where('id','=',$request->id)
            ->update($newarr);
            
        return back();
    }
}