<?php

namespace App\Http\Controllers\Admin\Banner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class AjaxBannerController extends Controller
{
    public function sort(Request $request)
    {
    	
    	if($request->has('data') && is_array($request->get('data')))
	    	foreach ($request->data as $key => $itemObject) {
	    		Banner::where('id',$itemObject['id'])->update(['sort'=>$itemObject['sort']]);
	    	}
    }
}
