<?php

namespace App\Http\Controllers\Admin\Shortcut;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shortcut;
class AjaxShortcutController extends Controller
{
    public function sort(Request $request)
    {
    	if($request->has('data') && is_array($request->get('data')))
	    	foreach ($request->data as $key => $itemObject) {
	    		Shortcut::where('id',$itemObject['id'])->update(['sort'=>$itemObject['sort']]);
	    	}
    }
}
