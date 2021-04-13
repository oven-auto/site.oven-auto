<?php

namespace App\Http\Controllers\Front\Callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\QuestionMail;
use App\Mail\SaleMail;
use App\Mail\TestDriveMail;
use DB;
use App\Models\Car;
use App\Models\Company;

use App\Services\FrontData\FrontDataService;
use App\Services\Company\CompanyService;

class MailController extends Controller
{

	public $companyService = null;
	public $frontDataService = null;

	public function __construct(FrontDataService $frontDataService, CompanyService $companyService)
	{
		$this->companyService = $companyService;
		$this->frontDataService = $frontDataService;
	}

    public function registration(Request $request)
    {	
    	if($request->has('type') && $request->get('type'))
    	{
    		$data = $request->input();

    		switch ($data['type']) {
    			case 'sale':
    				return $this->sendSale($data);
    				break;

    			case 'config':
    				return $this->sendSale($data);
    				break;

    			case 'testdrive':
    				return $this->sendTestdrive($data);
    				break;
    			
    			default:
    				return $this->sendQuestion($data);
    				break;
    		}

    	}
    }

    private function sendQuestion($data)
    {
    	Mail::to('oit@oven-auto.ru')->send(new QuestionMail($data));
    	return response()->json(['status'=>1,'view'=>view('front.response.order')->render()]);
    }

    private function sendSale($data)
    {	
    	if(isset($data['vin']))
    		$data['car'] =  $this->frontDataService->getCarByVin($data['vin']);
    	if(isset($data['complect']))
    	{
    		$complect = \App\Models\Complect::with(['mark','motor'])->find($data['complect']);
    		$car = $this->frontDataService->configCarByComplect($complect);
    		$car->color_id = isset($data['color_id']) ? $data['color_id'] : '';
    		$car->img = \App\Models\MarkColor::where('mark_id',$car->mark_id)->where('color_id',$car->color_id)->first()->img;
    		$data['car'] = $car;
    	}

    	if(isset($data['pack_ids']))
    		$data['packs'] = \App\Models\Pack::find($data['pack_ids']);
    	

    	if(isset($data['company_ids']) && is_array($data['company_ids']) && count($data['company_ids']))
    		$data['companies'] = $this->companyService->getCheckedCompanies($data['company_ids']);

    	Mail::to('oit@oven-auto.ru')->send(new SaleMail($data));
    	return response()->json(['status'=>2,'view'=>view('front.response.order')->render()]);
    }

    private function sendTestdrive($data)
    {
    	Mail::to('oit@oven-auto.ru')->send(new TestDriveMail($data));
    	return response()->json(['status'=>3,'view'=>view('front.response.order')->render()]);
    }
}
