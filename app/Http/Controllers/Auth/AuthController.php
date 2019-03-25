<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use Storage;
use Image;
use Hash;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    public function redirectToProvider($provider)
    {   
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/');
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser) {
            return $authUser;
        }else{
            $authUser = User::where('email',$user->email)->first();
            $file = file_get_contents($user->getAvatar());

            $image_path = 'image/'.md5_file($user->getAvatar()).".jpg";
            // $image_path = $file->hashName('image');

            $image = Image::make($file)->fit(96, 96);

            Storage::disk('public_uploads')->put($image_path, (string) $image->encode());

            if($authUser){
                DB::table('users')->where('email',$user->email)
                    ->update([
                        'provider' => $provider,
                        'provider_id' => $user->id,
                        'image_path' => $image_path,
                        $provider => $user->name,
                    ]);

                return $authUser;

            }else{
                 $data = User::create([
                            'name'     => $user->name,
                            'email'    => !empty($user->email)? $user->email : '' ,
                            'provider' => $provider,
                            'provider_id' => $user->id,
                            'image_path' => $image_path,
                            $provider => $user->name,
                        ]);
                return $data;
            }
        }
    }

    //  public function login(Request $request){
    //     $user = User::where('username',$request->username)
    //                 ->where('password',$request->password)
    //                 ->first();
    //     if($user){
    //         Auth::login($user,!empty($request->remember_me));

    //         return redirect('/setup/dashboard');
    //     }else{
    //         return back();
    //     }
    // }
}