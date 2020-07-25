<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use File;

class HomeController extends Controller
{
    public function getHome()
    {
    	return view('admin.page.home.dashboard');
    }

    public function get404()
    {
    	return view('admin.page.home.404');
    }

    public function getChangePass(){
        $user = Auth::user();
        return view('admin.page.home.change_password_account',['user'=>$user]);
    }

    public function getProfile(){
    	$user = Auth::user();
    	$position = Position::all();
    	return view('admin.page.home.profile', ['user' => $user,'position' => $position]);
    }

    public function postChangePass(Request $request){
        $this->validate($request,[
	        'password'=>'required|min:6|max:32',
	        'repassword' =>'required|same:password'
        ],[
	        'password.required'=>'Bạn chưa nhập mật khẩu',
	        'repassword.required'=>'Bạn chưa nhập lại mật khẩu',
	        'password.min'=>'Mật khẩu phải lớn hơn 6 ký tự',
	        'password.max'=>'Mật khẩu phải nhở hơn 32 ký tự',
	        'repassword.same'=>'Mật khẩu không trùng khớp.'
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        $name = $user->name;
        return redirect(route('admin.home'))->with('thongbao','Đổi mật khẩu thành công cho tài khoản '.$name.'.');
    }

    public function getEditProfile(){
    	$user = Auth::user();
    	$position = Position::all();
    	return view('admin.page.home.edit_profile', ['user' => $user,'position' => $position]);
    }

    public function postEditProfile(Request $request){
    	// dd($request->all());
    	// // 
    	// $this->validate($request,[
     //            'birthday' => 'required|date_format:d/m/Y',
     //            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
     //        ],[
     //        	'birthday.date_format' =>'Ngày tháng năm không hợp lệ.',
     //        	'phone.regex' =>'Số điện thoại không hợp lệ.',
     //        ]
     //    );
    	$user = Auth::user();
    	$user->name = $request->name;
    	$user->email = $request->email;

    	$unsigned_name = str::slug($request->name)."-".$user->id;
    	$current_date_time = Carbon::now()->format('d-m-Y');
        $name_photo = $unsigned_name.'-'.$current_date_time."-".Str::random(8);

    	$path = public_path('upload/avatar');
   
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if ($request->hasFile('image')) {
        	File::delete($path.'/'.$user->avatar);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."-".$name;
            while (file_exists($path.'/'.$photo)) {
                $photo = $unsigned_name.'-'.$current_date_time."-".Str::random(5)."-". $photo;
                File::delete($path.'/'.$photo);
            }
            $file -> move($path,$photo);
            $user->avatar = $photo;
        }else {
            $user->avatar = $request->iconname;
        }

        if ($request->birthday == "") {
            $user->birthday = null;
        }else { 
    	   $user->birthday = Carbon::parse(implode('-', explode("/", $request->birthday)))->format('Y-m-d');
        }

    	$user->sex = $request->sex;
    	$user->phone = $request->phone;
    	$user->locations = $request->locations;
    	$user->facebook = $request->facebook;
    	$user->status = $request->status;
    	$user->position_id = $request->position_id;
    	$user->save();
    	return redirect(route('admin.profile'));

    }

}
