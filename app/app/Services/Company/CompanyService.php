<?php
namespace App\Services\Company;
use DB;
use App\Models\Company;
use App\Models\Mark;
use App\Models\Complect;
use App\Models\Transmission;
use App\Models\Driver;
use App\Models\Car;

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

	public function getCompanyByCar(Car $car)
	{
		$companies = \App\Models\Company::select('companies.*')->with(['controll','conditions','calculation','section','scenario'])
			->leftJoin('company_cars','company_cars.company_id','=','companies.id')
			->where('company_cars.mark_id',$car->mark_id)
			->orWhere('company_cars.complect_id',$car->complect_id)
			->orWhere('company_cars.vin',$car->vin)
			->orWhere('company_cars.transmission_id',$car->complect->motor->transmission_id)
			->orWhere('company_cars.driver_id',$car->complect->motor->driver_id)
			->orWhere('company_cars.delivery_id',$car->status_delivery)
			->orWhere('company_cars.min_price','<',$car->total_price)
			->orWhere('company_cars.max_price','>',$car->total_price)
			->orWhere('company_cars.year','>',$car->year)
			->groupBy('companies.id')
			->get();
		
		foreach ($companies as $index=>$itemCompany) 
		{
			foreach($itemCompany->conditions as $key => $condition)
			{
				$res = $condition->only([
						'mark_id','complect_id','vin','transmission_id','driver_id','delivery_id','min_price','max_price','year'
				]);
				$i = 0;
				$countParam = (count(array_filter($res)));
				
				if($condition->mark_id == $car->mark_id)
					$i++;
				
				if($condition->complect_id == $car->complect_id)
					$i++;
				
				if($condition->vin == $car->vin)
					$i++;
				
				if($condition->transmission_id == $car->complect->motor->transmission_id)
					$i++;
				
				if($condition->driver_id == $car->complect->motor->driver_id)
					$i++;
				
				if($condition->delivery_id == $car->complect->motor->status_delivery && $condition->delivery_id)
					$i++;
				
				if($condition->min_price <= $car->total_price && $condition->min_price)
					$i++;
				
				if($condition->max_price >= $car->total_price && $condition->max_price)
					$i++;
				
				if($condition->year <= $car->year && $condition->year)
					$i++;

				if($i == $countParam && $condition->type==0)
					unset($companies[$index]);
				elseif($i != $countParam)
					unset($itemCompany->conditions[$key]);
			}
			$itemCompany->parameters = $this->calculate($itemCompany);
		}
		return $companies;
	}
}