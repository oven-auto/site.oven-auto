<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $guarded = [];

    public function marks()
    {
    	return $this->hasMany(\App\Models\PackMark::class,'pack_id','id');
    }

    public function options()
    {
    	return $this->hasMany(\App\Models\PackOption::class,'pack_id','id');
    }

    public function brand()
    {
    	return $this->hasOne(\App\Models\Brand::class,'id','brand_id');
    }

}
