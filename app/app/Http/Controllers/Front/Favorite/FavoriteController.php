<?php

namespace App\Http\Controllers\Front\Favorite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Session;
use App\Services\FrontData\FrontDataService;

class FavoriteController extends Controller
{
	public $favorites = array();

	private $service = null;
    
    public function __construct(FrontDataService $service)
    {
        $this->service = $service;
    }

	private function init()
	{
		$this->favorites = Session::get('favorites');
	}

    public function push(Car $car)
    {
    	$this->init();
    	$status = 0;
    	if(array_key_exists($car->id, $this->favorites))
    	{
    		$status = 0;
    		unset($this->favorites[$car->id]);
    	}
    	else
    	{
    		$status = 1;
    		$this->favorites[$car->id] = $car->id;
    	}
    	Session::put('favorites',$this->favorites);
    	return response()->json([
    		'status' => $status,
    		'count' => count($this->favorites)
    	]);
    }

    public function show()
    {
        // $favorites = session()->get('favorites');
        // $cars = $this->service->getCars(['cars_id'=>$favorites]);
        // $view = view('front.cars.cars',compact('cars'))->render();

        // return response()->json([
        //     'status'=>($cars->count()) ? 1 : 0,
        //     'view'=>$view,
        //     'page'=>$cars->currentPage()+1
        // ]);
    }
}
