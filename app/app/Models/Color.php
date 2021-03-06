<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $guarded = [];

    public function brand()
    {
    	return $this->hasOne(\App\Models\Brand::class,'id','brand_id')->withDefault();
    }
}
