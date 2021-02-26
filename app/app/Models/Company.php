<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function controll()
    {
    	return $this->hasOne(\App\Models\CompanyControll::class,'company_id','id')->withDefault();
    }

    public function conditions()
    {
    	return $this->hasMany(\App\Models\CompanyCar::class,'company_id','id');
    }

    public function calculation()
    {
    	return $this->hasOne(\App\Models\CompanyCalculation::class,'company_id','id')->withDefault();
    }

    public function section()
    {
    	return $this->hasOne(\App\Models\CompanySection::class,'id','section_id')->withDefault();
    }

    public function scenario()
    {
    	return $this->hasOneThrough(
            \App\Models\CompanyScenario::class,
            \App\Models\CompanyControll::class,
            'company_id', 
            'id', 
            'id', 
            'scenario_id' 
        )->withDefault();
    }
}
