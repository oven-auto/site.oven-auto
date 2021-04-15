<?php

namespace App\Http\Controllers\Front\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complect;
class AjaxComplectController extends Controller
{
    public function getcomplect($complect_id)
    {
    	$complect = Complect::with(['options.option','packs.pack.options.option','motor'])->find($complect_id);
    	
    	return response()->json([
    		'status'=>1,
    		'view'=>view('front.pricelist.complect',compact('complect'))->render()
    	]);
    }
}
