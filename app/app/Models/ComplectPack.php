<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplectPack extends Model
{
    protected $guarded = [];

    public function pack()
    {
    	return $this->hasOne(\App\Models\Pack::class,'id','pack_id');
    }
}
