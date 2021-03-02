<?php

namespace App\Http\Controllers\Front\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AjaxModelController extends Controller
{
    public function getModelImage(Request $request,$model_id,$color_id='')
    {
    	if(!empty($color_id) && !empty($model_id))
    	{	
    		$img = \App\Models\MarkColor::with('color')->where('mark_id',$model_id)->where('color_id',$color_id)->first();
    		
    		return response()->json([
    			'img'=>asset('storage/'.$img->img),
    			'name'=>$img->color->name,
    			'status'=>($img) ? 1 : 0
    		]);
    	}
    	return response()->json([
    		'status' => 0
    	]);
    }
}
