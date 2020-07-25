<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Position;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use File;

class PositionController extends Controller
{
    public function getIndex(){
        $positions = Position::all();
    	return view('admin.page.position.list', ['positions' => $positions]);
    }

    public function getAdd(){
    	return view('admin.page.position.add');
    }

    public function postAdd(Request $request)
    {
    	$positions = new Position();
        $positions->name = $request->name;
        $positions->unsigned_name = str::slug($request->name);
        $positions->save();
        return redirect(route('listposition'))->with('notice', 'Thêm thành công chức vụ '.$request->name);
    }

    public function getEdit($id){
        if (Position::where('id', $id)->first()) {
            $positions = Position::find($id);
        	return view('admin.page.position.edit', ['positions' => $positions]);
        }else{
            return redirect(route('404'));
        }
    }

    public function postEdit(Request $request, $id)
    {
    	$positions = Position::find($id);
        $positions->name = $request->name;
        $positions->unsigned_name = str::slug($request->name);
        $positions->save();
        return redirect(route('listposition'))->with('notice', 'Cập nhật thành công chức vụ '.$request->name);
    }

    public function getDelete($id){
        if (Position::where('id', $id)->first()) {
            $positions = Position::find($id);
            $positions->delete();
            return back()->with('notice', 'Xóa thành công chức vụ.');
        }else{
            return redirect(route('404'));
        }
    }
}
