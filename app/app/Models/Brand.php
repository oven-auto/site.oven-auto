<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name','icon'];

    // public function marks()
    // {
    // 	return $this->hasMany(\App\Models\Mark::class,'brand_id','id');
    // }
}
