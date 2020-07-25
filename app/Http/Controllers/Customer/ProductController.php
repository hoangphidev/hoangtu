<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;
use App\Models\ProductView;

class ProductController extends Controller
{
    public function getDetailProduct($id){
    	date_default_timezone_set('Asia/Ho_Chi_Minh');
        $product = Product::find($id);
        ProductView::createViewLog($product);
    	$product_offer= Product::where('cate_id', $product->cate_id)->inRandomOrder()->limit(4)->get();
    	$comments = Comment::where("product_id",$id)->get();
        $data = [
            'product' => $product,
            'product_offer' => $product_offer,
            'comments' => $comments
        ];
        return view('customer.pages.productdetail',$data);
    }
    
    public function getAllProduct(){
        $data['products'] = Product::paginate(16);
        return view('customer.pages.getallproduct',$data);
    }

    public function postConment($id,Request $request){
    	$comment = new Comment();
    	$comment->name = $request->name;
    	$comment->email = $request->email;
    	$comment->body = $request->content;
    	$comment->product_id = $id;
    	$comment->save();
    	return back();
    }
}
