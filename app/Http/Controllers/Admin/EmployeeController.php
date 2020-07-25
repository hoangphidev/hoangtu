<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\User;
use App\Models\Position;
use Carbon\Carbon;
use File;

class EmployeeController extends Controller
{
    public function getIndex(){
        $users = User::all();
    	return view('admin.page.user.list', ['users' => $users]);
    }

    public function getAdd(){
        $position = Position::all();
    	return view('admin.page.user.add', ['position'=>$position]);
    }

    public function postAdd(Request $request)
    {

        $this->validate($request,[
                'email'=>'required|email|unique:tb_users,email'
            ],[
                'email.unique' => 'Email đã tồn tại. Vui lòng thử lại.',
            ]
        );

        $password = "admin123";
    	$user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($password);
        $user->sex = $request->sex;
        $user->position_id = $request->position_id;
        $user->save();
        return redirect(route('listemployee'))->with('notice', 'Thêm thành công nhân viên '.$request->name);
    }

    public function getEdit($id){
        if (User::where('id', $id)->first()) {
            $position = Position::all();
            $user = User::find($id);
            if ($user->id == 1) {
                return redirect(route('404'));
            }else {
                return view('admin.page.user.edit', ['user' => $user, 'position'=>$position]);
            }
        }else {
            return redirect(route('404'));
        }
    }

    public function postEdit(Request $request, $id)
    {
    	$user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->sex = $request->sex;
        $user->status = $request->status;
        $user->position_id = $request->position_id;
        $user->save();
        return redirect(route('listemployee'))->with('notice', 'Cập nhật thành công nhân viên '.$request->name);
    }

    public function getDelete($id){
        if (User::where('id', $id)->first()) {
            $user = User::find($id);
            $path = public_path('upload/avatar/');                
            if (file_exists($path.$user->avatar)) {
                File::delete($path.$user->avatar);
            }
            $user->delete();
            return back()->with('notice', 'Xóa thành công nhân viên !');
        }else {
            return redirect(route('404'));
        }
    }
}
