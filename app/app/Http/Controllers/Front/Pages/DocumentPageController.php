<?php

namespace App\Http\Controllers\Front\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentPageController extends Controller
{
    public function index()
    {
    	return view('front.pages.document.index');
    }
}
