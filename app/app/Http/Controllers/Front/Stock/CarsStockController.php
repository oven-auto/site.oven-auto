<?php

namespace App\Http\Controllers\Front\Stock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;

class CarsStockController extends Controller
{
	private $service = null;
    
    public function __construct(FrontDataService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {   
        $models = $this->service->pluck('Mark',['name','id'],['status'=>1]);
        $transmissions = $this->service->transmissionType();
        $drivers = $this->service->driverType();
        $deliveries = $this->service->deliveryStage();

        $optionFilters = collect($this->service->pluck('OptionFilter',['name','id']));
        $chunkFilters = $optionFilters->chunk(ceil($optionFilters->count()/3));
        
        $carCount = $this->service->getCarCount();
    	$cars = $this->service->getCars($request->input());

    	return view('front.stock.stockindex',compact('cars','carCount','models','transmissions','drivers','deliveries','chunkFilters'));
    }
}
