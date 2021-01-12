<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarNotice extends Model
{
    protected $guarded = [];

    public function getFormatDateAttribute()
    {
    	return date('d.m.Y',strtotime($this->notice_date));
    }
}
