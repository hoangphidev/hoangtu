<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use DB;
use Socialite;
use Exception;

class LoginController extends Controller
{
    public function getLogin()
    {
    	if (Auth::check()) {
    		return redirect(route('admin.home'));
    	}else {
    		return view('admin.page.login');
    	}
    }

    public function postLogin(Request $request)
    {
    	$email = $request['email'];
    	$password = $request['password'];

    	if (Auth::attempt(['email' => $email, 'password' => $password])) {
    		return redirect(route('admin.home'));
    	}else {
    		return redirect(route('admin.login'))->with('notice', 'Tài khoản hoặc mật khẩu không chính xác !');
    	}
    }

    public function outLogin(Request $request){
        Auth::logout();
        return redirect(route('admin.login'));
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect(route('admin.login'));
        }
        
        $existingUser = User::where('email', $user->email)->first();

        if($existingUser){
            auth()->login($existingUser, true);
        } else {
            // create a new user
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;
            $newUser->google_id       = $user->id;
            $newUser->avatar          = $user->avatar;
            // dd($user->avatar);
            $newUser->position_id       = 5;
            $newUser->save();

            auth()->login($newUser, true);
        }
        return redirect()->to(route('admin.home'));
    }


    public function redirectToSocial($social)
    {
        $redirect = Socialite::driver($social)->redirect();
        switch ($social) {
            case 'facebook':
                return $redirect;
                break;

            case 'google':
                return $redirect;
                break;

            case 'github':
                return $redirect;
                break;

            default:
                return redirect(route('admin.login'));
                break;
        }
    }

    public function handleSocialCallback($social)
    {
        try {
            $user = Socialite::driver($social)->user();
        } catch (\Exception $e) {
            return redirect(route('admin.login'));
        }

        switch ($social) {
            case 'facebook':
                $this->addNewUser($user, $social);
                break;

            case 'google':
                $this->addNewUser($user, $social);
                break;

            case 'github':
                $this->addNewUser($user, $social);
                break;

            default:
                dd(0);
                break;
        }

        return redirect()->to(route('admin.home'));
    }

    public static function addNewUser($user, $social)
    {
        $existedUser = User::where('email', $user->email)->first();
        if($existedUser){

            switch ($social) {
                case 'facebook':
                    $existedUser->facebook_id = $user->id;
                    break;

                case 'google':
                    $existedUser->google_id = $user->id;
                    break;

                case 'github':
                    $existedUser->github_id = $user->id;
                    break;
            }
            $existedUser->save();

            auth()->login($existedUser, true);
        } else {
            $newUser                  = new User;
            $newUser->name            = $user->name;
            $newUser->email           = $user->email;

            switch ($social) {
                case 'facebook':
                    $newUser->facebook_id = $user->id;
                    break;

                case 'google':
                    $newUser->google_id = $user->id;
                    break;

                case 'github':
                    $newUser->github_id = $user->id;
                    break;
            }
            
            $newUser->avatar          = $user->avatar;
            $newUser->position_id       = 5;
            $newUser->save();

            auth()->login($newUser, true);
        }
    }
}
