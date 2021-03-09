<?php

namespace App\Http\Controllers\Front\Configurator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;

class ConfiguratorController extends Controller
{
	private $service = null;
    
    public function __construct(FrontDataService $service)
    {
        $this->service = $service;
    }

   	public function show($id)
   	{
   		$complect = $this->service->getComplectById($id);
   		$test = $this->service->getTestCarByModel($complect->mark);
   		return view('front.configurator.config',compact('complect','test'));
   	}
}
