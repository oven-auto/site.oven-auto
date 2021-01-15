<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarReceiving extends Model
{
    protected $guarded = [];

    public function provisions()
    {
    	return $this->hasMany(\App\Models\CarReceivingProvision::class,'receving_id','id');
    }
}
