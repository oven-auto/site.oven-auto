<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackMark extends Model
{
    protected $guarded = [];

    public function mark()
    {
    	return $this->hasOne(\App\Models\Mark::class,'id','mark_id')->withDefault();
    }
}
