<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public static function getScenarioList()
    {
    	return [
    		1=>'Расчёт',
    		2=>'Бюджет',
    		3=>'Номенклатура',
    		4=>'Описание'
    	];
    }
}
