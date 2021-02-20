<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Budget extends AbstractCompanyClass implements CalculationInterface
{
	public $budget = null;

	public function adminRender()
	{
		return view('admin.company.budget')->with('self',$this);
	}

	public function clientRender()
	{

	}

	public function setData()
	{

	}

	public function fill($company)
	{
		$data = json_decode($company);
		
		if(isset($data->budget))
			$this->budget = $data->budget;
	}
}