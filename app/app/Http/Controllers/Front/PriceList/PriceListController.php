<?php

namespace App\Http\Controllers\Front\PriceList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;

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
    	return view('front.pricelist.pricelist',compact('model','complects','test','title'));
    }
}
