<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $guarded = [];

    public function transmission()
    {
    	return $this->hasOne(\App\Models\Transmission::class,'id','transmission_id')->withDefault();
    }

    public function driver()
    {
    	return $this->hasOne(\App\Models\Driver::class,'id','driver_id')->withDefault();
    }

    public function type()
    {
    	return $this->hasOne(\App\Models\MotorType::class,'id','type_id')->withDefault();
    }

    public function brand()
    {
        return $this->hasOne(\App\Models\Brand::class,'id','brand_id')->withDefault();
    }

    public function getFullNameAttribute()
    {
        return $this->brand->name.' '.$this->size.' ('.$this->power.'л.с.)'.$this->transmission->name.' '.$this->driver->name.' ('.$this->name.')';
    }
}
