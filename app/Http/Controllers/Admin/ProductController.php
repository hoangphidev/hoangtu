<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Position;
use App\Models\Category;
use App\Models\Carrier;
use App\Models\Product;
use Carbon\Carbon;
use File;

class ProductController extends Controller
{
    public function getIndex(){
        $product = Product::orderBy('id','DESC')->get();
    	return view('admin.page.product.list', ['product'=>$product]);
    }

    public function getAdd(){
        $cate = Category::all();
        $carrier = Carrier::all();
    	return view('admin.page.product.add', ['cate'=>$cate, 'carrier'=>$carrier]);
    }

    public function postAdd(Request $request)
    {
    	$product = new Product();
        $product->name = $request->name;
        $unsigned_name = str::slug($request->name);
        $product->unsigned_name = $unsigned_name;
        $product->price = $request->price;
        $product->description = $request->description;

        $cate = Category::find($request->cate_id);
        $current_date_time = Carbon::now()->format('d-m-Y');
        $name_photo = $unsigned_name.'-'.$current_date_time."-".Str::random(8);

        if(!File::isDirectory('upload')){
            File::makeDirectory('upload', 0777, true, true);
        }

        if(!File::isDirectory('upload/product')){
            File::makeDirectory('upload/product', 0777, true, true);
        }

        $path = public_path('upload/product/'.$cate->unsigned_name);
   
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."-".$name;
            while (file_exists($path.'/'.$photo)) {
                $photo = $unsigned_name.'-'.$current_date_time."-".Str::random(5)."-". $photo;
            }
            $file -> move($path,$photo);
            $product->images = $photo;
        }else {
            $product->images = "";
        }

        $product->amount = $request->amount;
        $product->percent_promotion = $request->percent_promotion;

        if ($request->percent_promotion == "") {
            $product->percent_promotion = null;
            $product->start_promotion = null;
            $product->end_promotion = null;
        }else {
            $product->percent_promotion = $request->percent_promotion;
            $product->start_promotion = Carbon::parse(implode('-', explode("/", $request->start_promotion)))->format('Y-m-d');
            $product->end_promotion = Carbon::parse(implode('-', explode("/", $request->end_promotion)))->format('Y-m-d');
        }

        $product->cate_id = $request->cate_id;
        $product->carrier_id = $request->carrier_id;
        $product->save();
        return redirect(route('listproduct'))->with('notice', 'Thêm thành công sản phẩm '.$request->name);
    }

    public function getEdit($id){
        if (Product::where('id', $id)->first()) {
            $product = Product::find($id);
            $cate = Category::all();
            $carrier = Carrier::all();
            return view('admin.page.product.edit',['product'=>$product,'cate'=>$cate,'carrier'=>$carrier]);
        }else {
            return redirect(route('404'));
        }
    }

    public function postEdit(Request $request, $id)
    {
    	$product = Product::find($id);
        $product->name = $request->name;
        $unsigned_name = str::slug($request->name);
        $product->unsigned_name = $unsigned_name;
        $product->price = $request->price;
        $product->description = $request->description;

        $cate = Category::find($request->cate_id);
        $current_date_time = Carbon::now()->format('d-m-Y');
        $name_photo = $unsigned_name.'-'.$current_date_time."-".Str::random(8);

        $path = public_path('upload/product/'.$cate->unsigned_name);
        if ($request->hasFile('image')) {
            File::delete($path.'/'.$product->images);
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $photo = $name_photo."-".$name;
            while (file_exists($path.'/'.$photo)) {
                File::delete($path.'/'.$photo);
                $photo = $unsigned_name.'-'.$current_date_time."-".Str::random(5)."-". $photo;
            }
            $file -> move($path,$photo);
            $product->images = $photo;
        }else {
            $product->images = $request->iconname;
        }

        $product->amount = $request->amount;
        $product->percent_promotion = $request->percent_promotion;

        if ($request->percent_promotion == "") {
            $product->percent_promotion = null;
            $product->start_promotion = null;
            $product->end_promotion = null;
        }else {
            $product->percent_promotion = $request->percent_promotion;
            $product->start_promotion = Carbon::parse(implode('-', explode("/", $request->start_promotion)))->format('Y-m-d');
            $product->end_promotion = Carbon::parse(implode('-', explode("/", $request->end_promotion)))->format('Y-m-d');
        }

        $product->status = $request->status;
        $product->cate_id = $request->cate_id;
        $product->carrier_id = $request->carrier_id;
        $product->save();
        return redirect(route('listproduct'))->with('notice', 'Cập nhật thành công sản phẩm '.$request->name);
    }

    public function getDelete($id){
        if (Product::where('id', $id)->first()) {
            $product = Product::find($id);
            $path = public_path('upload/product/'.$product->getCate['unsigned_name'].'/');
            if (file_exists($path.$product->images)) {
                File::delete($path.$product->images);
            }
            $product->delete();
            return back()->with('notice', 'Xóa thành công sản phẩm.');
        }else {
            return redirect(route('404'));
        }
    }
}
