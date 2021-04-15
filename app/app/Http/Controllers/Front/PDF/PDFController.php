<?php

namespace App\Http\Controllers\Front\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use PDF;
use App\Services\FrontData\FrontDataService;

class PDFController extends Controller
{
	private $service = null;
    
    public function __construct(FrontDataService $service)
    {
        $this->service = $service;
    }

    public function getCar(\App\Services\Company\CompanyService $companyService,$id)
    {

    	$car = $this->service->getCarById($id);
        $companies = $companyService->getCompanyByCar($car)
            ->sortBy(function($val){
                return $val->section->sort;
            })
            ->groupBy('section_id');
    	$pdf = PDF::loadView('front.pdf.car',compact('car','companies'));
    	return $pdf->download('invoice.pdf');
    }

    public function getComplect($id)
    {
    	$complect = $this->service->getComplectById($id);
    	//return view('front.pdf.complect',compact('complect'));
    	$pdf = PDF::loadView('front.pdf.complect',compact('complect'));
    	return $pdf->download('invoice.pdf');
    }
}
