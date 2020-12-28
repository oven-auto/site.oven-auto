<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function getMarksByBrand(Request $request, $single = '')
    {
    	if($request->has('brand_id') && $request->get('brand_id'))
    		$marks = Mark::where('brand_id',$request->get('brand_id'))->get()->pluck('name','id');

    	if($marks->count())
    		if($single)
    			return response()->json([
		    		'view'=>view('admin.getters.single-mark-select',compact('marks'))->render(),
		    		'status'=>1
		    	]);
    		else
		    	return response()->json([
		    		'view'=>view('admin.getters.mark-select',compact('marks'))->render(),
		    		'status'=>1
		    	]);

	    return response()->json([
	    	'view'=>'',
	    	'status'=>0
	    ]);
    }
}
