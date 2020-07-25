<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "tb_products";

    protected $dates = [
	    'start_promotion',
	    'end_promotion',
	    'dates'
	];

	protected $casts = [
		'start_promotion' => 'date:Y-m-d',
		'end_promotion' => 'date:Y-m-d'
	];

    public function getCate()
    {
        return $this->belongsTo('App\Models\Category','cate_id','id');
    }

    public function getCarrier()
    {
        return $this->belongsTo('App\Models\Carrier','carrier_id','id');
    }
}
