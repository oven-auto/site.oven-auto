<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleOptionController extends Controller
{
    public function index()
    {
    	return view('front.pages.saleoption.index');
    }
}
