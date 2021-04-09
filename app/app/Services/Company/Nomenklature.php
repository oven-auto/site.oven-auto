<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;
use App\Models\Car;

Class Nomenklature extends AbstractCompanyClass implements CalculationInterface
{
	public $nomenklatures = [];
	public $company = null;
	public function adminRender()
	{
		return view('admin.company.nomenklature');
	}

	public function clientRender()
	{
		return view('front.company.nomenklature')->with('self',$this);
	}

	public function setData(Car $car)
	{
		return 'data-value="0"';
	}

	public function fill($company)
	{
		$this->company = $company;
		
		$data = json_decode($company->calculation->parameters);
		
		$data = json_decode($data);
		if(is_array($data))
			foreach ($data as $key => $obj) 
				if(is_object($obj))
					$this->push($obj);
	}

	private function push($obj)
	{
		$this->nomenklatures[$obj->id] = $obj->name;
	}

	public function nomenklature()
	{
		return join(', ',$this->nomenklatures);
	}

	public function price($car)
	{
		return 0;
	}
}