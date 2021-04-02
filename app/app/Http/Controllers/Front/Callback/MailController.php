<?php

namespace App\Http\Controllers\Front\Callback;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\QuestionMail;
use App\Mail\SaleMail;
use App\Mail\TestDriveMail;

class MailController extends Controller
{
    public function registration(Request $request)
    {	dump($request->all());
    	if($request->has('type') && $request->get('type'))
    	{
    		$data = $request->input();

    		switch ($data['type']) {
    			case 'sale':
    				return $this->sendSale($data);
    				break;

    			case 'testdrive':
    				return $this->sendTestdrive($data);
    				break;
    			
    			default:
    				return $this->sendQuestion($data);
    				break;
    		}

    	}
    }

    private function sendQuestion($data)
    {
    	Mail::to('oit@oven-auto.ru')->send(new QuestionMail($data));
    	return response()->json(['status'=>1]);
    }

    private function sendSale($data)
    {
    	Mail::to('oit@oven-auto.ru')->send(new SaleMail($data));
    	return response()->json(['status'=>2]);
    }

    private function sendTestdrive($data)
    {
    	Mail::to('oit@oven-auto.ru')->send(new TestDriveMail($data));
    	return response()->json(['status'=>3]);
    }
}
