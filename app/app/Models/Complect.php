<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complect extends Model
{
    protected $guarded = [];

    protected $withCount = ['cars'];
    
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

    public function cars()
    {
        return $this->hasMany(\App\Models\Car::class,'complect_id','id');
    }

    public function getFormatPriceAttribute()
    {
        return number_format($this->price,0,'',' ').'р.';
    }

    public function getFullNameAttribute()
    {
        $result = $this->name.' '.$this->code.' '.$this->motor->adminName;
        $result = trim($result);
        if($result)
            return $result;
        return false;
    }

    public function getFrontNameAttribute()
    {
        $result = [];
        $result[] = $this->name;
        $result[] = $this->motor->adminName;
        return implode(' ', $result);
    }
}
