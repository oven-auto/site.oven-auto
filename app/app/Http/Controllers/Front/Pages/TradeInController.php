<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;

class TradeInController extends Controller
{	
	public $service = null;

	public function __construct(FrontDataService $service)
	{
		$this->service = $service;
	}

    public function index()
    {
    	$models = $this->service->getModelsForTabs();
    	return view('front.pages.tradein.index',compact('models'));
    }
}
