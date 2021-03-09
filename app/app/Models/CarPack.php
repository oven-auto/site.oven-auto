<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarPack extends Model
{
    protected $guarded = [];

    public function pack()
    {
    	return $this->hasOne(\App\Models\Pack::class,'id','pack_id');
    }
}
