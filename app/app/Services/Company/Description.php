<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;
use App\Models\Car;

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

	public function setData(Car $car)
	{
		return 'data-value="0"';
	}

	public function fill($company)
	{
		$this->company = $company;
	}

	public function price($car)
	{
		return 0;
	}
}