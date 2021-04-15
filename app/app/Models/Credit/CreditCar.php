<?php

namespace App\Models\Credit;

use Illuminate\Database\Eloquent\Model;

class CreditCar extends Model
{
    protected $guarded = [];
    protected $with = ['model'];
    public function model()
    {
    	return $this->hasOne(\App\Models\Mark::class,'id','mark_id')->withDefault();
    }
}
