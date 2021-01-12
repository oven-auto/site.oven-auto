<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class CarPlan extends Model
{
    protected $guarded = [];

    public function getFormatDateAttribute()
    {
    	return date('d.m.Y',strtotime($this->plan_date));
    }
}
