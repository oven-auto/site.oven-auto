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
    	return $this->hasOne(\App\Models\Driver::class,'id','drive_id')->withDefault();
    }

    public function type()
    {
    	return $this->hasOne(\App\Models\MotorType::class,'id','type_id')->withDefault();
    }
}
