<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function getFullNameAttribute()
    {
    	return $this->name.' '.$this->city;
    }
}
