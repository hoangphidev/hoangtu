<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getHome(){
    	$product_new = Product::orderBy('id','desc')->take(8)->get();
    	$product = Product::where('sale', '>', 0)->orderBy('sale', 'desc')->take(4)->get();

        return view('customer.pages.home',['product'=>$product,'product_new'=>$product_new]);
    }

    public function getAbout()
    {
        return view('customer.pages.about');
    }

    public function getShip()
    {
        return view('customer.pages.ship');
    }

    public function getSeachResult(Request $requset){
        $data['products'] = Product::where('name','like','%'.$requset->seach.'%')->paginate(16);
        $data['search'] = $requset->seach;
        return view('customer.pages.search',$data);
    }

    public function getSlideDetail($id)
    {
        $sl = Banner::find($id);
        return view('customer.pages.slide', ['sl' => $sl]);
    }

}
