<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarkProperty extends Model
{
    protected $guarded = [];

    public function property()
    {
    	return $this->hasOne(\App\Models\Property::class,'id','property_id')->withDefault();
    }
}
