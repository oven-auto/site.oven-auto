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

    public function getcars(Request $request, $view = '')
    {
    	$cars = $this->service->getCars($request->input());
        if($cars->count())
            $view = view('front.cars.cars',compact('cars'))->render();
        else
        {
            if($request->has('complect_id') && $request->get('complect_id'))
                $view = view('front.cars.empty_complect',compact('cars'))->render();
            elseif ($request->has('page')) 
                $view = view('front.cars.empty_search',compact('cars'))->render();
        }
    	return response()->json([
    		'status'=>($cars->count()) ? 1 : 0,
    		'view'=>$view,
            'page'=>$cars->currentPage()+1
    	]);
    }
}
