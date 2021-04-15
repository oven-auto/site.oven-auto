<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	protected $guarded = [];

    public function brands()
    {
    	return $this->hasMany(\App\Models\OptionBrand::class,'option_id','id');
    }

    public function type()
    {
    	return $this->hasOne(\App\Models\OptionType::class,'id','type_id')->withDefault();
    }

    public function filter()
    {
    	return $this->hasOne(\App\Models\OptionFilter::class,'id','filter_id')->withDefault();
    }
}
