<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplectColor extends Model
{
	protected $guarded = [];
	
    public function colorpacks()
    {
    	return $this->hasMany(\App\Models\ComplectColorPack::class,'complect_color_id','id');
    }
}
