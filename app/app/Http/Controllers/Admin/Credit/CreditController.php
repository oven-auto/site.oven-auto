<?php

namespace App\Http\Controllers\Admin\Credit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreditRequest;
use App\Services\Credit\CreditService;
use App\Services\UploadService;
use App\Models\Credit\Credit;

class CreditController extends Controller
{
	private $service = null;
	private $upload = null;

	public function __construct(CreditService $creditService, UploadService $upload)
	{
		$this->service = $creditService;
		$this->UploadService = $upload;
	}

    public function index()
    {
    	$credits = $this->service->getCredits();
    	return view('admin.credit.index',compact('credits'));
    }

    public function create()
    {
    	$marks = $this->service->getArrayMarks();
    	return view('admin.credit.add',compact('marks'));
    }

    public function store(CreditRequest $request)
    {
    	$credit = $this->service->createCredit($request->input());
    	$this->service->updateCredit($credit,$this->UploadService->store($request->only(['banner']),$credit));
    	
    	if($credit)
    		return redirect()->route('credits.edit',$credit)->with('status','Новый кредит добавлен');
    	return redirect()->route('credits.create')->with('status','Произошла ошибка. Кредит не добавлен');
    }

    public function show(Credit $credit)
    {

    }

    public function edit(Credit $credit)
    {
    	$marks = $this->service->getArrayMarks();
    	return view('admin.credit.add',compact('marks','credit'));
    }

    public function update(CreditRequest $request, Credit $credit)
    {
    	$credit = $this->service->updateCredit($credit,$request->input());
    	$this->service->updateCredit($credit,$this->UploadService->store($request->only(['banner']),$credit));
    	
    	if($credit)
    		return redirect()->route('credits.edit',$credit)->with('status','Новый кредит добавлен');
    	return redirect()->route('credits.create')->with('status','Произошла ошибка. Кредит не добавлен');
    }

    public function destroy(Credit $credit)
    {

    }
}
