<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Nomenklature implements CalculationInterface
{
	public function adminRender()
	{
		return view('admin.company.nomenklature');
	}

	public function clientRender()
	{

	}

	public function setData()
	{

	}
}