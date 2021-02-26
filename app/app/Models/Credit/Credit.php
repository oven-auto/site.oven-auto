<?php

namespace App\Models\Credit;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
	protected $guarded = [];
	protected $with = ['models'];
	
    public function models()
    {
    	return $this->hasMany(\App\Models\Credit\CreditCar::class,'credit_id','id');
    }
}
