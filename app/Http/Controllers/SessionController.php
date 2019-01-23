<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\sysdb\Company;
use App\User;
use DB;
use Auth;
use Session;

class SessionController extends Controller
{
    public function __construct(){
    	$this->middleware('guest', ['except'=>'destroy']);
    }

 	public function view(){
    	return view('login');
    }

    public function login(Request $request){
    	$user = User::where('username',$request->username)
    				->where('password',$request->password)
    				->first();
    	if($user){
    		Auth::login($user,!empty($request->remember_me));

    		return redirect('/setup/dashboard');
    	}else{
    		return back();
    	}
    }

    public function destroy(){
    	Session::flush();
        Auth::logout();
        
        return redirect('/');
    }
}
