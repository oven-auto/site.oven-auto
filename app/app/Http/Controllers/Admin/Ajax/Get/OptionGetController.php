<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\OptionBrand;

class OptionGetController extends Controller
{
    public function getOptionByBrand(Request $request)
    {
    	if($request->has('brand_id') && $request->get('brand_id'))
    		$options = Option::select('options.*')->leftJoin('option_brands','option_brands.option_id','options.id')->where('option_brands.brand_id',$request->get('brand_id'))->orderBy('options.type_id')->orderBy('options.name')->groupBy('options.id')->get()->groupBy('type_id');
    	
    	
    	if($options->count())
	    	return response()->json([
	    		'view'=>view('admin.getters.options',compact('options'))->render(),
	    		'status'=>1
	    	]);

	    return response()->json([
	    	'view'=>'',
	    	'status'=>0
	    ]);
    }

    public function getOptionAll(Request $request)
    {
    	$options = Option::orderBy('type_id')->orderBy('name')->get()->groupBy('type_id');

    	if($options->count())
	    	return response()->json([
	    		'view'=>view('admin.getters.options',compact('options'))->render(),
	    		'status'=>1
	    	]);

	    return response()->json([
	    	'view'=>'',
	    	'status'=>0
	    ]);
    }
}
