<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;
use App\Models\Car;

Class Budget extends AbstractCompanyClass implements CalculationInterface
{
	public $budget = null;
	public  $company = null;
	
	public function adminRender()
	{
		return view('admin.company.budget')->with('self',$this);
	}

	public function clientRender()
	{
		return view('front.company.budget')->with('self',$this);
	}

	public function setData(Car $car)
	{
		return 'data-value="'.$this->budget.'"';
	}

	public function fill($company)
	{
		$this->company = $company;
		
		$data = json_decode($company->calculation->parameters);
		
		if(isset($data->budget))
			$this->budget = $data->budget;
	}

	public function price($car)
	{
		$k = 1;
		if($this->company->section_id == 1 || $this->company->section_id == 2 || $this->company->section_id == 4)
			$k = -1;
		return $k*$this->budget;
	}
}