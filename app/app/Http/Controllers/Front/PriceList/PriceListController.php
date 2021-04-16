<?php

namespace App\Http\Controllers\Front\PriceList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;
use App\Models\MotorType;
use App\Models\Transmission;
use App\Models\Driver;
class PriceListController extends Controller
{
	private $service = null;

	public function __construct(FrontDataService $service)
	{
		$this->service = $service;
	}

    public function index($slug)
    {
    	$model = $this->service->getModelForPriceList($slug);
    	$complects = $this->service->getComplectsByModel($model);
        $test = $this->service->getTestCarByModel($model);
        $title = 'Прайс-лист '.$model->brand->name.' '.$model->name;
        $motorTypes = MotorType::pluck('name','id')->toArray();
        $transmissionTypes = $this->service->transmissionType();
        $driverTypes = $this->service->driverType();
    	return view('front.pricelist.pricelist',compact('model','complects','test','title','motorTypes','transmissionTypes','driverTypes'));
    }
}
