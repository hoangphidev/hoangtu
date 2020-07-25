<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = "tb_banners";

    public function getCate()
    {
        return $this->belongsTo('App\Models\Category','cate_id','id');
    }
}
