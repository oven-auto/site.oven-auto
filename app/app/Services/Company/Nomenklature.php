<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

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

	public function setData()
	{

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
}