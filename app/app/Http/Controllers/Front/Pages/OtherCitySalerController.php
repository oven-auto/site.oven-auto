<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtherCitySalerController extends Controller
{
    public function index()
    {
    	return view('front.pages.othercity.index');
    }
}
