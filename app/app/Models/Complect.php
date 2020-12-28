<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complect extends Model
{
    protected $guarded = [];

    public function mark()
    {
    	return $this->hasOne(\App\Models\Mark::class,'id','mark_id')->withDefault();
    }

    public function options()
    {
    	return $this->hasMany(\App\Models\ComplectOption::class,'complect_id','id');
    }

    public function packs()
    {
    	return $this->hasMany(\App\Models\ComplectPack::class,'complect_id','id');
    }

    public function motor()
    {
        return $this->hasOne(\App\Models\Motor::class,'id','motor_id')->withDefault();
    }

    public function brand()
    {
        return $this->hasOne(\App\Models\Brand::class,'id','brand_id')->withDefault();
    }

    public function getFormatPriceAttribute()
    {
        return number_format($this->price,0,'',' ').'р.';
    }
}
