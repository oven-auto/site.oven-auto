<?php

namespace App\Models\Credit;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
	protected $guarded = [];
	protected $with = ['models'];
	private static $month = [
		'Январь','Февраль','Март',
		'Апрель','Май','Июнь',
		'Июль','Август','Сентябрь',
		'Октябрь','Ноябрь','Декабрь',
	];

    public function models()
    {
    	return $this->hasMany(\App\Models\Credit\CreditCar::class,'credit_id','id');
    }

    public static function getRusCurrentMonth()
    {
    	$month = date('n');
    	return self::$month[$month-1];
    }
}
