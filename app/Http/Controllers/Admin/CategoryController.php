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
use DB;


class CategoryController extends Controller
{
    public function getIndex(){
        $cate = Category::all();
        return view('admin.page.category.list', ['cate'=>$cate]);
    }

    public function getAdd(){
        return view('admin.page.category.add');
    }

    public function postAdd(Request $request)
    {
        $cate = new Category();
        $cate->name = $request->name;
        $cate->unsigned_name = str::slug($cate->name);
        $cate->save();
        return redirect(route('listcate'))->with('notice', 'Thêm thành công danh mục '.$request->name);
    }

    public function getEdit($id){
        if (Category::where('id', $id)->first()) {
            $cate = Category::find($id);
            return view('admin.page.category.edit', ['cate'=>$cate]);
        }else {
            return redirect(route('404'));
        }
    }

    public function postEdit(Request $request, $id)
    {
        $cate = Category::find($id);
        $cate->name = $request->name;
        $cate->unsigned_name = str::slug($cate->name);
        $cate->status = $request->status;

        if (DB::table('tb_products')->count() != 0) {
            if ($request->status == 0) {
                DB::table('tb_products')->where('cate_id', $id)->update(['status' => 0]);
            }
        }

        if (DB::table('tb_banners')->count() != 0) {
            if ($request->status == 0) {
                DB::table('tb_banners')->where('cate_id', $id)->update(['status' => 0]);
            }
        }


        $cate->save();
        return redirect(route('listcate'))->with('notice', 'Sửa thành công danh mục '.$request->name);
    }

    public function getDelete($id){
        if (Category::where('id', $id)->first()) {
            $cate = Category::find($id);
            $cate->delete();
            return back()->with('notice', 'Xóa thành công danh mục.');
        }else {
            return redirect(route('404'));
        }
    }
}
