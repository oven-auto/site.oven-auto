<?php

namespace App\Http\Controllers\Admin\Ajax\Get;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackController extends Controller
{
    public function getPackByBrand(Request $request)
    {
    	return response()->json([
    		'status'=>1,
    		'view'=>'2323'
    	]);
    }
}
