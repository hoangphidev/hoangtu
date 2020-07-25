<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    protected $table = "tb_products_views";

    public static function createViewLog($product) {
        $productView = new ProductView();
        $productView->product_id = $product->id;
        $productView->unsigned_name = $product->unsigned_name;
        $productView->url = \Request::url();
        $productView->session_id = \Request::getSession()->getId();
        $productView->ip = \Request::ip();
        // $productView->ip = \Request::getClientIp();
        $productView->agent = \Request::header('User-Agent');
        $productView->save();
    }

}
