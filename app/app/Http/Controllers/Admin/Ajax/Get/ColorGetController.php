<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Brand;
use App\Models\Complect;
use App\Models\MarkColor;
use App\Models\Pack;
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
        if($request->has('mark_id') && $request->get('mark_id'))
        {
            $markColors = MarkColor::with('color')->where('mark_id',$request->mark_id)->get();
            $packs = Pack::where('colored',1)->pluck('code','id');

            return response()->json([
                'view' => view('admin.complect.colors',compact('markColors','packs'))->render(),
                'status'=>1
            ]);
        }
    }
}
