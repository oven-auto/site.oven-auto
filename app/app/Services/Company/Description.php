<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Description extends AbstractCompanyClass  implements CalculationInterface
{
	public function adminRender()
	{
		return view('admin.company.description');
	}

	public function clientRender()
	{

	}

	public function setData()
	{

	}

	public function fill($company)
	{
		
	}
}