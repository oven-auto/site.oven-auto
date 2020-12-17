<?php

namespace App\Http\Controllers\Admin\Ajax;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ajax\MarkAjaxRequest;
use App\Models\Mark;

class MarkAjaxController extends Controller
{
    public function sort(MarkAjaxRequest $request,Mark $mark)
    {
    	$mark->update([
    		'sort'=>$request->get('sort')
    	]);
    	return response()->json([
			'sort'=> $mark->sort,
			'id' =>$mark->id
		]);
    }

    public function status(MarkAjaxRequest $request,Mark $mark)
    {
    	$mark->update([
    		'status'=>$request->get('status')
    	]);
    	return response()->json([
			'status'=> $mark->status,
			'id' =>$mark->id
		]);
    }
}
