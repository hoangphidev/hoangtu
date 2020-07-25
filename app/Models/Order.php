<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "tb_orders";
    
    public function getproduct()
    {
    	return $this->belongsTo('App\Models\Product','product_id','id');
    }
}
