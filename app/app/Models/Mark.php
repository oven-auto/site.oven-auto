<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $guarded = [];

    public function brand()
    {
    	return $this->hasOne(\App\Models\Brand::class,'id','brand_id')->withDefault();
    }

    public function body()
    {
    	return $this->hasOne(\App\Models\Body::class,'id','body_id')->withDefault();
    }

    public function country()
    {
    	return $this->hasOne(\App\Models\Country::class,'id','country_id')->withDefault();
    }

    public function documents()
    {
        return $this->hasOne(\App\Models\Document::class,'mark_id','id')->withDefault();
    }

    public function properties()
    {
        return $this->hasMany(\App\Models\MarkProperty::class,'mark_id','id');
    }

    public function colors()
    {
        return $this->hasMany(\App\Models\MarkColor::class,'mark_id','id')->with('color');
    }

    public function complects()
    {
        return $this->hasMany(\App\Models\Complect::class,'mark_id','id')->orderBy('sort');
    }

    public function currentcomplects()
    {
        return $this->hasMany(\App\Models\Complect::class,'mark_id','id')->where('status',1)->orderBy('sort');
    }

    public function lowcomplect()
    {
        return $this->hasOne(\App\Models\Complect::class,'mark_id','id')->orderBy('price')->withDefault();
    }

    public function cars()
    {
        return $this->hasMany(\App\Models\Car::class,'mark_id','id');
    }

    public function credits()
    {
        return $this->hasManyThrough(
            \App\Models\Credit\Credit::class,
            \App\Models\Credit\CreditCar::class,
            'mark_id',
            'id',
            'id',
            'credit_id',
            'id'
        );
    }

    public static function getRandomBanner()
    {
        $image = self::orderByRaw("RAND()")->first()->banner;
        return $image;
    } 


}
