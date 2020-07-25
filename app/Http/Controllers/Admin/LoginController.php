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
}
