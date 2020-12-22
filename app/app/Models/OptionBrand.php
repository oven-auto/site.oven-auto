<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OptionBrand extends Model
{
    protected $guarded = [];

    public function brand()
    {
    	return $this->hasOne(\App\Models\Brand::class,'id','brand_id');
    }

    public function option()
    {
    	return $this->hasOne(\App\Models\Option::class,'id','option_id');
    }
}
