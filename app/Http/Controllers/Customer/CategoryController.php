<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class CategoryController extends Controller
{
    public function getCategory($id){
        $products = Product::where('cate_id',$id)->paginate(16);
        $cates = Category::find($id);
        return view('customer.pages.categories', ['products' => $products, 'cates' => $cates]);
    }

}
