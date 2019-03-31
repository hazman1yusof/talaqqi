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
use Hash;
use File;
use App\Exports\TalaqqiExport;
use Maatwebsite\Excel\Facades\Excel;

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
    				->paginate(7);

        return view('student_detail',compact('user','talaqqi'));
    }

    public function bio(Request $request){

        $bio = DB::table('users')->where('id','=',$request->id);

    	if(!empty($request->file('image_file'))){
            $file = $request->file('image_file');
            $image_path = $file->hashName('image');

            $image = Image::make($file)->fit(96, 96);

            Storage::disk('public_uploads')->put($image_path, (string) $image->encode());

			File::delete('uploads/'.$bio->first()->image_path);

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

        $user = DB::table('users')->where('id','=',$request->user_id)
                    ->first();

        if(Hash::check($request->oldpass, $user->password)){
            DB::table('users')->where('id','=',$request->user_id)
                ->update([
                    'password' => Hash::make($request->newpass)
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
                    'ayat_dari' => $request->ayat_dari,
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
                    'ayat_dari' => $request->ayat_dari,
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
        //yang ni untuk janji dia tu semua, yang save tu nama inssyaAllah tu..
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


    public function delete($id,Request $request){
        $users = DB::table('users')
            ->where('id','=',$id)
            ->delete();

        $talaqqi = DB::table('talaqqi')
            ->where('user_id','=',$id)
            ->delete();

        return back();
    }

    public function excel($id,Request $request){
        $user = DB::table('users')
                    ->where('id','=',$id)
                    ->first();

        return Excel::download(new TalaqqiExport($id), $user->name.' talaqqi.xlsx');
    }
}