<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Detail;
use DB;

class OrderController extends Controller
{
    public function getOrder()
    {
        $order = Order::where('status',0)->orderBy('created_at','DESC')->get();
        $detail = Detail::all();
        $product = Product::all();
        return view('admin.page.order.listorder', ['order'=>$order, 'detail' =>$detail, 'product' => $product]);
    }

    public function getDelivery()
    {
        $order = Order::where('status',1)->orderBy('created_at','DESC')->get();
        $detail = Detail::all();
        $product = Product::all();
        return view('admin.page.order.listdelivery', ['order'=>$order, 'detail' =>$detail, 'product' => $product]);
    }

    public function getShipped()
    {
        $order = Order::where('status','>',1)->orderBy('created_at','DESC')->get();
        $detail = Detail::all();
        $product = Product::all();
        return view('admin.page.order.listshipped', ['order'=>$order, 'detail' =>$detail, 'product' => $product]);
    }

    public function deliveryOrder($id){
        $status = Order::find($id);
        $st = $status->status;
        if ($st  == 0) {
            $status->status  = 1;
            $status->save();
            return redirect(route('listorder'))
            ->with('notice','Đang giao hàng đơn #'.$id);
        } 
    }

    public function deliveredOrder($id){
        $status = Order::find($id);
        $st = $status->status;
        $detail = Detail::all();
        foreach ($detail as $dt) {
            if ($dt->order_id == $id) {
                $idproduct = $dt->product_id;
                $product = Product::find($idproduct);
                if ($dt->product_id == $product->id) {
                    $count = ($product->amount) - ($dt->count);
                    $sale = ($product->sale) + ($dt->count);
                    DB::table('tb_products')
                        ->where('id',  $idproduct)
                        ->update(['amount' => $count, 'sale' => $sale]);
                }
            }
        }
        if ($st  == 1) {
            $status->status  = 2;
            $status->save();
            return redirect(route('listdelivery'))
            ->with('notice','Đã giao hàng đơn #'.$id);
        }
    }

    public function cancelOrder($id){
        $status = Order::find($id);
        $st = $status->status;
        
        if ($st  == 0) {
            $status->status  = 3;
            $status->save();
            return redirect(route('listorder'))
            ->with('notice','Đã huỷ đơn #'.$id);
        }

        if ($st  == 1) {
            $status->status  = 3;
            $status->save();
            return redirect(route('listdelivery'))
            ->with('notice','Đã huỷ đơn #'.$id);
        }
    }

    public function getDetailOrder($id){
        $order = Order::find($id);
        $detail = Detail::where('order_id', $order->id)->get();
        $product = Product::all();
        return view('admin.page.order.orderdetail', ['order'=>$order, 'detail' =>$detail, 'product' => $product]);
    }
}
