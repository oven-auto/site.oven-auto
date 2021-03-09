<?php

namespace App\Http\Controllers\Front\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;

class CarController extends Controller
{
	private $service = null;
    
    public function __construct(FrontDataService $service)
    {
        $this->service = $service;
    }

    public function show($id)
    {
    	$car = $this->service->getCarById($id);
    	$test = $this->service->getTestCarByModel($car->mark);
    	return view('front.cars.car_page',compact('car','test'));
    }
}
