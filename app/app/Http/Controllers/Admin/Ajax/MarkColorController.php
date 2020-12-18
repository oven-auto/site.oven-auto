<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class MarkColorController extends Controller
{
    public function get(Request $request)
    {
    	$colors = Color::where('brand_id',$request->brand_id)->get();
    	
    	return response()->json([
    		'view'=>view('admin.mark.colorlist',compact('colors'))->render()
    	]);
    }
}
