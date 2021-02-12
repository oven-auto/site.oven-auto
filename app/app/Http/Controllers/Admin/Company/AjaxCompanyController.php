<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
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
    	$models = $this->service->getModelsForSelect();
        $complects = $this->service->getComplectsForSelect();
        $transmissions = $this->service->getTransmissionsForSelect();
        $drivers = $this->service->getDriversForselect();

        $var = compact('models','complects','transmissions','drivers');
    	
    	if($type == 1)
    		return response()->json([
    			'view'=>view('admin.company.cars_in',$var)->render(),
    			'status'=>1
    		]);
    	if($type==0)
    		return response()->json([
    			'view'=>view('admin.company.cars_out',$var)->render(),
    			'status'=>1
    		]);
    }
}
