<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplectOption extends Model
{
    protected $guarded = [];

    public function option()
    {
    	return $this->hasOne(\App\Models\Option::class,'id','option_id')->withDefault();
    }
}
