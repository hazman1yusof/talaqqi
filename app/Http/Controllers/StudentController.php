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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   

        DB::enableQueryLog();
        $students = DB::table('users')
                        ->where('users.role','=','student');

        if(!empty($request->search)){
            $students = $students->where('users.name','like','%'.$request->search.'%');
        }

        $students = $students->orderBy('users.id', 'desc')->paginate(16);

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

    public function add(Request $request){
        $exists = DB::table('users')->where('name','=',$request->name)->exists();

        if(!$exists){
            DB::table('users')->insert([
                'name' => $request->name,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'password' => $request->password,
                'role' => $request->role
            ]);
        }else{
            return back()->withErrors(['error', 'name already used']);
        }
        return back();
        
    }

}