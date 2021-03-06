<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Order;
use App\Models\Detail;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Category;
use Cart;
use Mail;
use DB;


class CartController extends Controller
{
    public function getAddCart($id){
        $product = Product::find($id);
        $category = Category::find($product->cate_id);
        Cart::add(['id' => $id, 'name' => $product->name, 'quantity' => 1, 'price' => $product->price, 'attributes' => ['images' => $product->images,'cate_name'=>$category->unsigned_name,'percent_promotion'=> $product->percent_promotion]]);
        return redirect('cart/showcart');
    }

    public function getShowCart(){
        return view('customer.pages.cart');
    }

    public function getDeleteCart($id){
        if($id=="DelAll"){
            Cart::clear();
        }else{
            Cart::remove($id);
        }
        return redirect('cart/showcart');
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->id, array('quantity' => $request->quantity - Cart::get($request->id)->quantity));
    }

    public function postCart(Request $request){
        if(!Cart::isEmpty()){
            $email_data['infor'] = $request->all();
            $email_data['carts'] = Cart::getContent();
            $email_data['total'] = $request->total;
            $infor = $request->all();
            $order = new Order();
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->email = $request->email;

            $wards = Ward::where('xaid', $request->wards)->first();
            $district = District::where('maqh', $request->district)->first();
            $city = Province::where('matp', $request->city)->first();
            $customer_address = $request->add.', '.$wards->name.', '.$district->name.', '.$city->name;
            $email_data['add'] = [
                'customer_address' => $customer_address
            ];
            $order->customer_address = $customer_address;
            $order->cost_total = $email_data['total'];
            $order->status = 0;
            $soluong = 0;
            foreach ($email_data['carts'] as $items) {
                $soluong += $items->quantity;
            }
            $order->count = $soluong;
            $order->save();

            foreach($email_data['carts'] as $detail){
                $dt = new Detail();
                $dt->order_id = $order->id;
                $dt->product_id = $detail->id;
                $dt->count = $detail->quantity;
                $dt->save();

                $product = Product::find($detail->id);
                $count = ($product->amount) - 1;
                $sale = ($product->sale) + 1;

                DB::table('tb_products')
                    ->where('id', $detail->id)
                    ->update(['amount' => $count, 'sale' => $sale]);

            }
            
            Mail::send('customer.pages.mail', $email_data, function($message) use ($infor) {
                $message->from('contact.hoangphimobile@gmail.com','Shop Hoàng Tú');
                $message->subject("Xác nhận đơn hàng");
                $message->to($infor['email'],$infor['name']);
                $message->cc('hoangphi.dev@gmail.com','Shop Hoàng Tú');
            });
            Cart::clear();
            return redirect('complete/'.$order->id."/".$order->email."/".$order->name.".html");
        }else{
            return back()->with('errorcart','Giỏ Hàng Trống');
        }
    }

    public function getComplete($id){
        return view('customer.pages.complete');
    }

    public function selectCart(Request $req)
    {
        $data = $req->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == "city") {
                $select_district = District::where('matp', $data['ma_id'])->orderBy('maqh', 'ASC')->get();
                $output.='<option>---Chọn quận / huyện---</option>';
                foreach ($select_district as $key => $district) {
                    $output.='<option value="'.$district->maqh.'">'.$district->name.'</option>';
                }
            }else {
                $select_wards = Ward::where('maqh', $data['ma_id'])->orderBy('xaid', 'ASC')->get();
                $output.='<option>---Chọn phường / xã---</option>';
                foreach ($select_wards as $key => $ward) {
                    $output.='<option value="'.$ward->xaid.'">'.$ward->name.'</option>';
                }
            }
        }
        echo $output;
    }
}

