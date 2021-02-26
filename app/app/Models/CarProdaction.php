<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarProdaction extends Model
{
    protected $guarded = [];

    public function plandates()
    {
    	return $this->hasMany(\App\Models\CarPlan::class,'prodaction_id','id')->orderBy('created_at','asc');
    }

    public function lastplandate()
    {
    	return $this->hasOne(\App\Models\CarPlan::class,'prodaction_id','id')->orderBy('created_at','desc')->withDefault();
    }

    public function noticedates()
    {
    	return $this->hasMany(\App\Models\CarNotice::class,'prodaction_id','id')->orderBy('created_at','asc');
    }

    public function lastnoticedate()
    {
    	return $this->hasOne(\App\Models\CarNotice::class,'prodaction_id','id')->orderBy('created_at','desc')->withDefault();
    }
}
