<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack;

class PackGetController extends Controller
{
    public function getPackByBrand(Request $request)
    {
    	
    	if($request->has('brand_id') && $request->get('brand_id'))
    	{
    		$packs = Pack::with('options.option')->where( 'brand_id', $request->get('brand_id') )->get();
	    	return response()->json([
	    		'status'=>1,
	    		'view'=>view('admin.getters.packs',compact('packs'))->render()
	    	],200);
	    }
	    else
	    {
	    	return response()->json([
	    		'status'=>0,
	    		'view'=>''
	    	],404);
	    }
    }
}
