<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complect;
use App\Models\ComplectColorPack;
class ComplectGetController extends Controller
{
    public function getComplectByMark(Request $request)
    {	
    	if($request->has('mark_id') && $request->get('mark_id'))
		{
			$complects = [];
			$complectsQuery = Complect::with('motor')->where('mark_id',$request->get('mark_id'))->get();
			foreach ($complectsQuery as $key => $itemComplect) {
				$complects[$itemComplect->id] = $itemComplect->fullName;
			}

			if(count($complects))
				return response()->json([
					'view'=>view('admin.getters.complect-select',compact('complects'))->render(),
					'status'=>1
				]);				
		}
		else
			return response()->json([
				'view'=>'',
				'status'=>0
			]);
    }

    public function getColorPack(Request $request)
    {
    	$pack = [];
    	if($request->has('complect_color_id') && $request->get('complect_color_id'))
    		$packs = ComplectColorPack::where('complect_color_id',$request->get('complect_color_id'))->pluck('pack_id');
    	return response()->json([
    		'status'=>(count($packs)) ? 1 : 0,
    		'packs_ids'=>$packs
    	]);
    }
}
