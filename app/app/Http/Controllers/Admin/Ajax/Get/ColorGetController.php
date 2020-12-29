<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Brand;

class ColorGetController extends Controller
{
    public function get(Request $request)
    {
    	$colors = Color::where('brand_id',$request->get('brand_id'))->get();
    	$brand = Brand::find($request->get('brand_id'));
    	return response()->json([
    		'view'=>view('admin.mark.colorlist',compact('colors','brand'))->render()
    	]);
    }

    public function getColorByComplect(Request $request)
    {

    }
}
