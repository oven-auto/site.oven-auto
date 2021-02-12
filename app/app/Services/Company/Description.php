<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Description implements CalculationInterface
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
}