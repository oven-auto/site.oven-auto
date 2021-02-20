<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyCar extends Model
{
    protected $guarded = [];
    protected $with = ['model','complect','transmission','driver'];

    public function model()
    {
    	return $this->hasOne(\App\Models\Mark::class,'id','mark_id')->withDefault();
    }

    public function complect()
    {
    	return $this->hasOne(\App\Models\Complect::class,'id','complect_id')->with('motor')->withDefault();
    }

    public function transmission()
    {
    	return $this->hasOne(\App\Models\Transmission::class,'id','transmission_id')->withDefault();
    }

    public function driver()
    {
    	return $this->hasOne(\App\Models\Driver::class,'id','driver_id')->withDefault();
    }
}
