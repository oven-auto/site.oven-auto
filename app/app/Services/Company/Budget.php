<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Budget implements CalculationInterface
{
	public function adminRender()
	{
		return view('admin.company.budget');
	}

	public function clientRender()
	{

	}

	public function setData()
	{

	}
}