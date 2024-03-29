<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarkColor extends Model
{
    protected $guarded = [];
    protected $with = ['color'];

    public function color()
    {
    	return $this->hasOne(\App\Models\Color::class,'id','color_id')->withDefault();
    }
}
