<?php

namespace App\Http\Controllers\Front\Configurator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FrontData\FrontDataService;
use App\Services\Company\CompanyService;

class ConfiguratorController extends Controller
{
  	private $service = null;
    private $companyService = null;
    
    public function __construct(FrontDataService $service, CompanyService $companyService)
    {
        $this->service = $service;
        $this->companyService = $companyService;
    }

   	public function show($id)
   	{
   		$complect = $this->service->getComplectById($id);
   		$test = $this->service->getTestCarByModel($complect->mark);
      $car = $this->service->configCarByComplect($complect);
      
      $companies = $this->companyService->getCompanyByCar($car)
            ->sortBy(function($val){
                return $val->section->sort;
            })
            ->groupBy('section_id');
   		return view('front.configurator.config',compact('complect','test','car','companies'));
   	}
}
