<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
use DataForSelect;

class AjaxCompanyController extends Controller
{
	public $service = null;

	public function __construct()
	{
		$this->service = new CompanyService();
	}

    public function getScenarioEditForm(Request $request)
    {	
    	if($request->has('scenario_id') && $request->get('scenario_id'))
    	{
    		$res = $this->service->setCompany($request->get('scenario_id'));
    		return response()->json([
    			'view'=>$res->adminRender()->render(),
    			'status'=>1
    		]);
    	}
    }

    public function getEmptyCondition($type)
    {
    	$models = DataForSelect::getModels();
        $complects = DataForSelect::getComplects();
        $transmissions = DataForSelect::getTransmissions();
        $drivers = DataForSelect::getDrivers();

        $var = compact('models','complects','transmissions','drivers');
    	
    	if($type == 1)
    		return response()->json([
    			'view'=>view('admin.company.cars_condition',$var)
                    ->with('status',1)
                    ->render(),
    			'status'=>1
    		]);
    	if($type==0)
    		return response()->json([
    			'view'=>view('admin.company.cars_condition',$var)
                    ->with('status',0)
                    ->render(),
    			'status'=>1
    		]);
    }
}
