<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Banner;
use App\Models\Carrier;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use File;

class CarrierController extends Controller
{
    public function getIndex(){
        $carriers = Carrier::all();
    	return view('admin.page.carrier.list', ['carriers' => $carriers]);
    }

    public function getAdd(){
    	$cate = Category::all();
    	return view('admin.page.carrier.add', ['cate' => $cate]);
    }

    public function postAdd(Request $request)
    {
    	$carrier = new Carrier();
        $carrier->name = $request->name;
        $carrier->unsigned_name = str::slug($request->name);
        $carrier->phone = $request->phone;
        $carrier->email = $request->email;
        $carrier->website = $request->website;
        $carrier->locations = $request->locations;
        $carrier->description = $request->description;
        $carrier->save();
        return redirect(route('listcarrier'))->with('notice', 'Thêm thành công nhà cung cấp '.$request->name);
    }

    public function getEdit($id){
        if (Carrier::where('id', $id)->first()) {
            $carrier = Carrier::find($id);
        	return view('admin.page.carrier.edit', ['carrier' => $carrier]);
        }else{
            return redirect(route('404'));
        }
    }

    public function postEdit(Request $request, $id)
    {
    	$carrier = Carrier::find($id);
        $carrier->name = $request->name;
        $carrier->unsigned_name = str::slug($request->name);
        $carrier->phone = $request->phone;
        $carrier->email = $request->email;
        $carrier->website = $request->website;
        $carrier->locations = $request->locations;
        $carrier->description = $request->description;
        $carrier->status = $request->status;
        $carrier->save();
        return redirect(route('listcarrier'))->with('notice', 'Cập nhật thành công nhà cung cấp '.$request->name);
    }

    public function getDelete($id){
        if (Carrier::where('id', $id)->first()) {
            $carrier = Carrier::find($id);
            $carrier->delete();
            return back()->with('notice', 'Xóa thành công nhà cung cấp.');
        }else{
            return redirect(route('404'));
        }
    }

}
