<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function complect()
    {
    	return $this->hasOne(\App\Models\Complect::class,'id','complect_id')->withdefault();
    }

    public function brand()
    {
        return $this->hasOne(\App\Models\Brand::class,'id','brand_id')->withdefault();
    }

    public function packs()
    {
    	return $this->hasMany(\App\Models\CarPack::class,'car_id','id');
    }

    public function options()
    {
    	return $this->hasMany(\App\Models\CarOption::class,'car_id','id');
    }

    public function mark()
    {
        return $this->hasOne(\App\Models\Mark::class,'id','mark_id')->withdefault();
    }

    public function prodaction()
    {
        return $this->hasOne(\App\Models\CarProdaction::class,'car_id','id')->withdefault();
    }

    public function receiving()
    {
    	return $this->hasOne(\App\Models\CarReceiving::class,'car_id','id')->withdefault();
    }

    public function delivery()
    {
        return $this->hasOne(\App\Models\DeliveryType::class,'id','delivery_id')->withdefault();
    }

    public function color()
    {
        return $this->hasOne(\App\Models\Color::class,'id','color_id')->withdefault();
    }

    public function markcolor()
    {
        return $this->hasOneThrough(
            \App\Models\MarkColor::class,
            \App\Models\Color::class,
            'id',
            'color_id',
            'mark_id', //where
            'id',
            'mark_id'
        );
    }

    public function getStatus()
    {
        $nowDate = date('d.m.Y');
        if($this->receiving->pre_sale_date)
            return "Подготовлена к прадаже";
        elseif($this->receiving->accept_stock_date)
            return "На складе дилера";
        elseif($this->prodaction->ship_date)
            return "Ожидает отгрузки";
        elseif($this->prodaction->ready_date)
            return "Готова к отгрузке";
        elseif($this->prodaction->build_date)
            return "Ожидает сборку";
        elseif($this->prodaction->noticedates->count())
            return "Есть уведомление о дате сборке";
        elseif ($this->prodaction->plandates->count()) 
            return "Есть запланированая дата сборки";
        elseif ($this->prodaction->order_date)
            return "Заказана в производство";
        else
            return "Нет даты заказа в производство";  
    }

    public function getIconStatusCss()
    {
        if($this->receiving->accept_stock_date)
            return "fa fa-car";
        elseif($this->prodaction->ready_date)
            return "fa fa-truck";
        else
            return "fa fa-steam";
    }

    public function getFrontStatus()
    {
        if($this->receiving->accept_stock_date)
            return "А/м в наличии";
        elseif($this->prodaction->ready_date)
            return "Готов к отгрузке";
        else
            return "В производстве";
    }
}
