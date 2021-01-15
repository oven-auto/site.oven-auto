<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function complect()
    {
    	return $this->hasOne(\App\Models\Complect::class,'id','complect_id')->withdefault();
    }

    public function packs()
    {
    	return $this->hasMany(\App\Models\CarPack::class,'car_id','id');
    }

    public function options()
    {
    	return $this->hasMany(\App\Models\CarOption::class,'car_id','id');
    }

    public function mark()
    {
        return $this->hasOne(\App\Models\Mark::class,'id','mark_id')->withdefault();
    }

    public function prodaction()
    {
        return $this->hasOne(\App\Models\CarProdaction::class,'car_id','id')->withdefault();
    }

    public function receiving()
    {
    	return $this->hasOne(\App\Models\CarReceiving::class,'car_id','id')->withdefault();
    }
}
