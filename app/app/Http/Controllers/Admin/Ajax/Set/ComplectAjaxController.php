<?php

namespace App\Http\Controllers\Admin\Ajax\Set;
use App\Models\Complect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplectAjaxController extends Controller
{
    public function status(Complect $complect, Request $request)
    {
    	if($request->has('status') )
	    	try
	    	{
	    		$complect->update($request->only('status'));
		    	return response()->json([
		    		'status'=>1,
		    		'message'=>'Комплектация '.$complect->name.' обновлена'
		    	],200);
		    }
		    catch(Exception $e)
		    {
		    	return response()->json([
		    		'status'=>0,
		    		'message'=>'Ошибка'
		    	],404);
		    }
    }
}
