<?php

namespace App\Http\Controllers\Front\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use DB;
class AjaxCarController extends Controller
{
    public function getcars(Request $request)
    {
    	$query = Car::select('cars.*', DB::raw('mark_colors.img as img'))
    		->with(['prodaction','receiving','color','brand','mark','complect.motor'])
    		->leftJoin('mark_colors',function($join){
    			$join->on('mark_colors.color_id','=','cars.color_id')
    				->on('mark_colors.mark_id','=','cars.mark_id');
    		});
    	if($request->has('complect_id') && $request->get('complect_id'))
    		$query->where('complect_id',$request->complect_id);
    	$cars = $query->get();

    	return response()->json([
    		'status'=>1,
    		'view'=>view('front.cars.cars',compact('cars'))->render()
    	]);
    }
}
