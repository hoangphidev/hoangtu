<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use File;


class BannerController extends Controller
{
    public function getIndex(){
        $banner = Banner::all();
    	return view('admin.page.banner.list', ['banner'=>$banner]);
    }

    public function getAdd(){
        $cate = Category::all();
    	return view('admin.page.banner.add', ['cate'=>$cate]);
    }

    public function postAdd(Request $request)
    {
    	$banner = new Banner();
        $banner->name = $request->name;
        $unsigned_name = str::slug($request->name);
        $banner->unsigned_name = $unsigned_name;

        $cate = Category::find($request->cate_id);
        $current_date_time = Carbon::now()->format('d-m-Y');
        $name_photo = $unsigned_name.'-'.$current_date_time."-".Str::random(8);

        if(!File::isDirectory('upload')){
            File::makeDirectory('upload', 0777, true, true);
        }

        $path = public_path('upload/banner');
   
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."-".$name;
            while (file_exists($path.$photo)) {
                $photo = $unsigned_name.'-'.$current_date_time."-".Str::random(5)."-". $photo;
            }
            $file -> move($path,$photo);
            $banner->images = $photo;
        }else {
            $banner->images = "";
        }

        $banner->description = $request->description;
        $banner->locate = $request->locate;
        $banner->cate_id = $request->cate_id;
        $banner->save();
        return redirect(route('listbanner'))->with('notice', 'Thêm thành công quảng cáo '.$request->name);
    }

    public function getEdit($id){
        if (Banner::where('id', $id)->first()) {
            $banner = Banner::find($id);
            $cate = Category::all();
            return view('admin.page.banner.edit', ['banner'=>$banner, 'cate'=>$cate]);
        }else {
            return redirect(route('404'));
        }
    }

    public function postEdit(Request $request, $id)
    {
    	$banner = Banner::find($id);
        $banner->name = $request->name;
        $unsigned_name = str::slug($request->name);
        $banner->unsigned_name = $unsigned_name;

        $cate = Category::find($request->cate_id);
        $current_date_time = Carbon::now()->format('d-m-Y');
        $name_photo = $unsigned_name.'-'.$current_date_time."-".Str::random(8);

        $path = public_path('upload/banner/');
   
        if ($request->hasFile('image')) {
            File::delete($path.$banner->images);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."-".$name;
            while (file_exists($path.$photo)) {
                $photo = $unsigned_name.'-'.$current_date_time."-".Str::random(5)."-". $photo;
                File::delete($path.$photo);
            }
            $file -> move($path,$photo);
            $banner->images = $photo;
        }else {
            $banner->images = $request->iconname;
        }

        $banner->description = $request->description;
        $banner->locate = $request->locate;
        $banner->status = $request->status;
        $banner->cate_id = $request->cate_id;
        $banner->save();
        return redirect(route('listbanner'))->with('notice', 'Sửa thành công quảng cáo '.$request->name);
    }

    public function getDelete($id){
        if (Banner::where('id', $id)->first()) {
            $banner = Banner::find($id);
            $path = public_path('upload/banner/');
            if (file_exists($path.$banner->images)) {
                File::delete($path.$banner->images);
            }
            $banner->delete();
            return back()->with('notice', 'Xóa thành công banner.');
        }else {
            return redirect(route('404'));
        }
    }
}
