<?php

namespace App\Http\Controllers\Front\Compare;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CompareController extends Controller
{
	public $service = null;
	public function __construct(\App\Services\FrontData\FrontDataService $service)
	{
		$this->service = $service;
	}

    public function index()
    {
    	$favorites = session()->get('favorites');
    	
    	if(empty($favorites))
    		return redirect()->back()->with('status','Вы не выбрали ни одного автомобиля');

        $cars = $this->service->getCarForCompare();
        $options = [];

        foreach ($cars as $key => $itemCar) 
        {
        	$mas = [];
        	if($itemCar->complect->options->count())
        		foreach($itemCar->complect->options as $itemComplectOption)
        		{
        			if(!array_key_exists($itemComplectOption->option->id, $options))
           				$options[$itemComplectOption->option->id] = $itemComplectOption->option->name;
           			$mas[$itemComplectOption->option->id] = '+';
        		}
        			
        		

        	if($itemCar->packs->count())
        		foreach ($itemCar->packs as $key => $itemPack) 
        		 	if($itemPack->pack->options->count())
        		 		foreach ($itemPack->pack->options as $key => $itemPackOption) 
        		 		{
        		 			if(!array_key_exists($itemPackOption->option->id, $options))
        						$options[$itemPackOption->option->id] = $itemPackOption->option->name;
        					$mas[$itemPackOption->option->id] = '+';
        				}

        	if($itemCar->options->count())
        		foreach ($itemCar->options as $key => $itemCarOption)
        		{
        			if(!array_key_exists($itemCarOption->option->id,$options))
        				$options[$itemCarOption->option->id] = $itemCarOption->option->name; 
        			$mas[$itemCarOption->option->id] = '+';      			
        		}
        	$itemCar->install = $mas;
        }
        foreach ($cars as $itemCar) {
        	$compare = [];
        	foreach ($options as $key => $name) {
        		if(array_key_exists($key, $itemCar->install))
        			$compare[$key] = '+';
        		else
        			$compare[$key] = '-';
        	}
        	$itemCar->compare = $compare;
        }
        return view('front.compare.index',compact('cars','options'));
    }
}


