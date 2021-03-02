<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complect;

class CarGetController extends Controller
{
    public function getView(Request $request)
    {
    	if($request->has('complect_id') && $request->get('complect_id'))
    	{
    		$complect = Complect::with(['mark.country','brand','motor','packs.pack.options','complectcolors.colorpacks','modelcolors.color'])->find($request->get('complect_id'));
    		return response()->json([
    			'view'=>view('admin.car.view',compact('complect'))->render(),
    			'status'=>1,
                'complect'=>$complect->toArray()
    		]);
    	}
    }
}
