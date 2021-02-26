<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;

class MotorGetController extends Controller
{
    public function getMotorByBrand(Request $request)
    {
    	if($request->has('brand_id') && $request->get('brand_id'))
    	{
    		$motors = Motor::with('transmission','driver','type')->where('brand_id',$request->get('brand_id'))->get();
    		
    		if($motors->count())
    		{
    			$tmp = [];
    			foreach ($motors as $key => $itemMotor) {
	    			$tmp[$itemMotor->id] = $itemMotor->fullName;
	    		}
	    		$motors = $tmp;
	    		return response()->json([
	    			'status'=>1,
	    			'view'=>view('admin.getters.motor-select',compact('motors'))->render()
	    		],200);
	    	}
    	}
    	return response()->json([
			'status'=>1,
			'view'=>'Ничего не нашлось'
		],404);
    }
}
