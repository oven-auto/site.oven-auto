<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
    public function getMarksByBrand(Request $request)
    {
    	if($request->has('brand_id') && $request->get('brand_id'))
    		$marks = Mark::where('brand_id',$request->get('brand_id'))->get()->pluck('name','id');

    	if($marks->count())
	    	return response()->json([
	    		'view'=>view('admin.pack.mark-select',compact('marks'))->render(),
	    		'status'=>1
	    	]);

	    return response()->json([
	    	'view'=>'',
	    	'status'=>0
	    ]);
    }
}
