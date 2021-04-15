<?php

namespace App\Http\Controllers\Front\Modal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function getCallModal(Request $request)
    {	
    	$view = view('forms.question')->render();

    	if($request->has('type'))

    		switch ($request->get('type')) {
    			
    			case 'question':
    				$view = view('forms.question')->render();
    				break;
    			
    			case 'testdrive':
    				$view = view('forms.testdrive')->render();
    				break;

    			case 'sale':
    				$view = view('forms.sale')->render();
    				break;

                case 'config':
                    $view = view('forms.configure')->render();
                    break;

    			default:
    				$view = view('forms.question')->render();
    				break;

    		}

    	return response()->json([
    		'view'=>$view
    	]);
    }
}
