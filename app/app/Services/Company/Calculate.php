<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Calculate implements CalculationInterface
{
	public function adminRender()
	{
		return view('admin.company.calculate');
	}

	public function clientRender()
	{

	}

	public function setData()
	{

	}
}