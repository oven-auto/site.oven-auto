<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Credit;

class CreditPageController extends Controller
{
    public function index(\App\Services\Credit\CreditService $service)
    {
    	$credits = $service->getAltualCredits();
    	return view('front.pages.credit.index',compact('credits'));
    }
}
