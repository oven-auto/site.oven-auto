<?php

namespace App\Http\Controllers\Front\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use DB;
use App\Services\FrontData\FrontDataService;

class AjaxCarController extends Controller
{
    private $service = null;
    
    public function __construct(FrontDataService $service)
    {
        $this->service = $service;
    }

    public function getcars(Request $request)
    {
    	$cars = $this->service->getCars($request->get('complect_id'));
    	return response()->json([
    		'status'=>1,
    		'view'=>view('front.cars.cars',compact('cars'))->render()
    	]);
    }
}
