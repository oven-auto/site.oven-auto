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
    	$cars = $this->service->getCars($request->input());
    	return view('front.stock.stockindex',compact('cars'));
    }
}
