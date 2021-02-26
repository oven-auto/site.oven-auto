<?php
namespace App\Services\Company;
use DB;
use App\Models\Company;
use App\Models\Mark;
use App\Models\Complect;
use App\Models\Transmission;
use App\Models\Driver;

/**
*Сервис класс для работы с моделью Company
*/

Class CompanyService
{
	private $company = null;
	
	private $companyFillColl = ['begin_date','end_date','status','section_id'];

	private $companyCarsFillColl = [
		'vin', 'mark_id', 'complect_id', 'transmission_id', 'driver_id', 
		'delivery_id', 'min_price', 'max_price', 'year', 'type'
	];

	private $companyControllFillColl = [
		'timer', 'link', 'promo', 'name', 'title', 
		'offer', 'text', 'scenario_id', 'main', 'immortal'
	];

	private $companyCalculationFillColl = [];
	
	private function extractValue($data, $keys)
	{
		$mas = array();
		foreach ($keys as $key => $value) 
			if(array_key_exists($value, $data))
				$mas[$value] = $data[$value];
		return $mas;
	}

	private function makeConditionArray($data)
	{
		$mas = array();
		if(isset($data['car']) && is_array($data['car']))
			foreach ($data['car'] as $collumn => $itemValues) 
				foreach ($itemValues as $key => $value) 
					$mas[$key][$collumn] = $value;
		return $this->validateCondition($mas);
	}

	private function validateCondition($data)
	{
		foreach($data as $key => $itemCondition)
		{	
			foreach($itemCondition as $col => $value)
				if($value===null)
					unset($itemCondition[$col]);
			if(count($itemCondition)<2)
				unset($data[$key]);
		}
		return $data;
	}

	public function __construct()
	{
		$this->company = app(Company::class);
	}

	public function getCompanyById($id):Company
	{
		$result = $this->company->find($id);
		if($result)
			return $result;
		abort(404,'Такой коммерческой акции нет');
	}

	public function setCompany($scenario_id)
	{
		switch ($scenario_id) {
			case 1:
				return new Calculate();
				break;
			
			case 2:
				return  app(Budget::class) ;
				break;

			case 3:
				return app(Nomenklature::class) ;
				break;

			case 4:
				return app(Description::class) ;
				break;
		}
	}

	public function createCompany($data)
	{	
		try
        {
            $company = DB::transaction(function() use ($data)
            {
				$company = Company::create($this->extractValue($data,$this->companyFillColl));
				$company->controll()->create($this->extractValue($data,$this->companyControllFillColl));
				$company->calculation()->create([
					'parameters'=>isset($data['parameters']) ? json_encode($data['parameters']) : ''
				]);
				$conditions = $this->makeConditionArray($data);
				foreach ($conditions as $key => $value) 
					$company->conditions()->create($this->extractValue($value,$this->companyCarsFillColl));
				return $company;
			});
        }
		catch(Exception $e)
        {
            return false;
        }
        return $company;
	}

	public function updatecompany($company,$data)
	{
		try
		{
			$result = DB::transaction(function() use ($company,$data)
			{
				$company->update($this->extractValue($data,$this->companyFillColl));
				$company->controll()->update($this->extractValue($data,$this->companyControllFillColl));
				$company->calculation()->update([
					'parameters'=>isset($data['parameters']) ? json_encode($data['parameters']) : ''
				]);
				$company->conditions()->delete();
				$conditions = $this->makeConditionArray($data);
				foreach ($conditions as $key => $value) 
					$company->conditions()->create($this->extractValue($value,$this->companyCarsFillColl));
				return $company;
			});
		}
		catch(Exception $e)
		{
			return false;
		}
		return $result;
	}

	public function getCompanies()
	{
		$companies = Company::with(['controll','conditions','calculation','scenario','section'])->get();
		return $companies;
	}

	public function calculate($company)
	{
		$result = $this->setCompany($company->controll->scenario_id);
		$result->fill($company->calculation->parameters);
		return $result;
	}
}