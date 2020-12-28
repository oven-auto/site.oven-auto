<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complect;
class ComplectGetController extends Controller
{
    public function getComplectByMark(Request $request)
    {	
    	if($request->has('mark_id') && $request->get('mark_id'))
		{
			$complects = [];
			$complectsQuery = Complect::with('motor')->get();
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
}
