<?php

namespace App\Http\Controllers\Front\Callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function registration(Request $request)
    {
    	dump($request->input());
    }
}
