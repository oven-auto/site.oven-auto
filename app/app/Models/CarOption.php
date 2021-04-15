<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarOption extends Model
{
    protected $fillable = ['car_id','option_id'];

    public function option()
    {
    	return $this->hasOne(\App\Models\Option::class,'id','option_id');
    }
}
