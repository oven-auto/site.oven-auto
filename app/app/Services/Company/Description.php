<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Description extends AbstractCompanyClass  implements CalculationInterface
{
	public $company = null;

	public function adminRender()
	{
		return view('admin.company.description');
	}

	public function clientRender()
	{
		return view('front.company.description')->with('self',$this);
	}

	public function setData()
	{

	}

	public function fill($company)
	{
		$this->company = $company;
	}
}