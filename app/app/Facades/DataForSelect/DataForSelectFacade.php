<?php
namespace App\Facades\DataForSelect;
use Illuminate\Support\Facades\Facade;

Class DataForSelectFacade extends Facade
{
	protected static function getFacadeAccessor()
    {
        return 'dataforselect';
    }
}