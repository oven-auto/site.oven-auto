<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;

class IndexController extends Controller
{
	private $service = null;

	public function __construct(FrontDataService $service)
	{
		$this->service = $service;
	}

    public function index()
    {
    	$models = $this->service->getModelsForTabs();
    	$banners = $this->service->getBanners();
    	$bodies = $this->service->getBodies();
    	return view('front.index',compact('bodies','banners','models'));
    }
}
