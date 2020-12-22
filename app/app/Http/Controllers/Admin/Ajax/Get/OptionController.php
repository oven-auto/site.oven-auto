<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\OptionBrand;

class OptionController extends Controller
{
    public function getOptionByBrand(Request $request)
    {
    	if($request->has('brand_id') && $request->get('brand_id'))
    		$options = Option::select('options.*')->leftJoin('option_brands','option_brands.option_id','options.id')->where('option_brands.brand_id',$request->get('brand_id'))->groupBy('options.id')->get();
    	
    	
    	if($options->count())
	    	return response()->json([
	    		'view'=>view('admin.pack.options',compact('options'))->render(),
	    		'status'=>1
	    	]);

	    return response()->json([
	    	'view'=>'',
	    	'status'=>0
	    ]);
    }
}
