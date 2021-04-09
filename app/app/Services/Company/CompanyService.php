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
				$company->calculation->fill([
						'parameters'=>isset($data['parameters']) ? json_encode($data['parameters']) : ''
					])->save();
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
		$result->fill($company);
		return $result;
	}

	public function getCompanyByCar(Car $car)
	{
		$now = date('Y-m-d');
		$companies = \App\Models\Company::select('companies.*')->with(['controll','conditions','calculation','section','scenario'])
			->leftJoin('company_cars','company_cars.company_id','=','companies.id')
			
			->where(function($query) use ($car){
				$query->where(function($query_mark) use ($car){
					$query_mark->where('company_cars.mark_id',$car->mark_id)
						->where('company_cars.mark_id','<>',0);
					})
				->orWhere(function($query_complect) use ($car) {
					$query_complect->where('company_cars.complect_id',$car->complect_id)
						->where('company_cars.complect_id','<>',0);
					})
				->orWhere(function($query_vin) use ($car){
					$query_vin->where('company_cars.vin',$car->vin)
						->where('company_cars.vin','<>',0);
					})
				->orWhere(function($query_transmission) use ($car){
					$query_transmission->where('company_cars.transmission_id',$car->complect->motor->transmission_id)
						->where('company_cars.transmission_id','<>',0);
					})
				->orWhere(function($query_driver) use ($car){
					$query_driver->where('company_cars.driver_id',$car->complect->motor->driver_id)
						->where('company_cars.driver_id','<>',0);
					})
				->orWhere(function($query_delivery) use ($car){
					$query_delivery->where('company_cars.delivery_id',$car->status_delivery)
						->where('company_cars.delivery_id','<>',0);
					})
				->orWhere(function($query_min) use ($car){
					$query_min->where('company_cars.min_price','<',$car->total_price)
						->where('company_cars.min_price','<>',0);
					})
				->orWhere(function($query_max) use ($car){
					$query_max->where('company_cars.max_price','>',$car->total_price)
						->where('company_cars.min_price','<>',0);
					})
				->orWhere(function($query_year) use ($car){
					$query_year->where('company_cars.year','>',$car->year)
						->where('company_cars.year','<>',0);
					});
			})
			->where('companies.status',1)
			->where('companies.begin_date','<',$now)
			->where('companies.end_date','>',$now)
			//->where('companies.section_id',5)

			->groupBy('companies.id')
			->get();
		// $companies = $companies->sort(function($val){
		// 	$val->section->sort;
		// });
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
				{
					//dump('Совпала модель '.$car->mark_id.'='.$condition->mark_id);
					$i++;
				}
				
				if($condition->complect_id == $car->complect_id)
				{
					//dump('Совпала комплектация '.$car->complect_id.'='.$condition->complect_id);
					$i++;
				}
				
				if($condition->vin == $car->vin)
				{
					//dump('Совпала vin '.$car->vin.'='.$condition->vin);
					$i++;
				}
				
				if($condition->transmission_id == $car->complect->motor->transmission_id)
				{
					//dump('Совпала KPP '.$car->complect->motor->transmission_id.'='.$condition->transmission_id);
					$i++;
				}
				
				if($condition->driver_id == $car->complect->motor->driver_id)
				{
					//dump('Совпала PRIVOD '.$car->complect->motor->driver_id.'='.$condition->driver_id);
					$i++;
				}
				
				if($condition->delivery_id == $car->status_delivery && $condition->delivery_id)
				{
					//dump('Совпала DELIVERY '.$car->status_delivery.'='.$condition->delivery_id);
					$i++;
				}
				
				if($condition->min_price <= $car->total_price && $condition->min_price)
				{
					//dump('Совпала min_price '.$car->total_price.'='.$condition->min_price);
					$i++;
				}
				
				if($condition->max_price >= $car->total_price && $condition->max_price)
				{
					//dump('Совпала max_price '.$car->total_price.'='.$condition->max_price);
					$i++;
				}
				
				if($condition->year <= $car->year && $condition->year)
				{
					//dump('Совпала YEAR '.$car->year.'='.$condition->year);
					$i++;
				}

				if($i == $countParam && $condition->type==0)
					unset($companies[$index]);
				elseif($i != $countParam)
					unset($itemCompany->conditions[$key]);
			}
			$itemCompany->parameters = $this->calculate($itemCompany);
			$this->bindValue($itemCompany,$car);
			
		}
		return $companies;
	}

	public function bindValue($itemCompany,$car)
	{
		$itemCompany->controll->title = str_replace('<model>', $car->mark->brand->name.' '.$car->mark->name, $itemCompany->controll->title);
		$itemCompany->controll->title = str_replace(
			'<budget>', 
			@number_format($itemCompany->parameters->budget,0,'',' ').' руб.', 
			$itemCompany->controll->title
		);
		$itemCompany->controll->title = str_replace('<procent>', @$itemCompany->parameters->procent.'%', $itemCompany->controll->title);
		$itemCompany->controll->title = str_replace('<vin>', $car->vin, $itemCompany->controll->title);
		$itemCompany->controll->title = str_replace(
			'<nomen>', 
			isset($itemCompany->parameters->nomenklatures) ? $itemCompany->parameters->nomenklature() : '', 
			$itemCompany->controll->title
		);
		$itemCompany->controll->title = str_replace('<promo>', $itemCompany->controll->promo, $itemCompany->controll->title);
		/**/
		$itemCompany->controll->offer = str_replace('<model>', $car->mark->brand->name.' '.$car->mark->name, $itemCompany->controll->offer);
		$itemCompany->controll->offer = str_replace(
			'<budget>', 
			@number_format($itemCompany->parameters->budget,0,'',' ').' руб.', 
			$itemCompany->controll->offer
		);
		$itemCompany->controll->offer = str_replace('<procent>', @$itemCompany->parameters->procent.'%', $itemCompany->controll->offer);
		$itemCompany->controll->offer = str_replace('<vin>', $car->vin, $itemCompany->controll->offer);
		$itemCompany->controll->offer = str_replace(
			'<nomen>', 
			isset($itemCompany->parameters->nomenklatures) ? $itemCompany->parameters->nomenklature() : '', 
			$itemCompany->controll->offer
		);
		$itemCompany->controll->offer = str_replace('<promo>', $itemCompany->controll->promo, $itemCompany->controll->offer);
		/**/
		$itemCompany->controll->text = str_replace('<model>', $car->mark->brand->name.' '.$car->mark->name, $itemCompany->controll->text);
		$itemCompany->controll->text = str_replace(
			'<budget>', 
			@number_format($itemCompany->parameters->budget,0,'',' ').' руб.', 
			$itemCompany->controll->text
		);
		$itemCompany->controll->text = str_replace('<procent>', @$itemCompany->parameters->procent.'%', $itemCompany->controll->text);
		$itemCompany->controll->text = str_replace('<vin>', $car->vin, $itemCompany->controll->text);
		$itemCompany->controll->text = str_replace(
			'<nomen>', 
			isset($itemCompany->parameters->nomenklatures) ? $itemCompany->parameters->nomenklature() : '', 
			$itemCompany->controll->text
		);
		$itemCompany->controll->text = str_replace('<promo>', $itemCompany->controll->promo, $itemCompany->controll->text);
	}

	public function getCheckedCompanies($company_ids)
	{
		$companies = $data['companies'] = Company::with(['controll','calculation','scenario','section'])
			->whereIn('id',$company_ids)
			->get();
		foreach ($companies as $key => $itemCompany) {
			$companies[$key] = $this->calculate($itemCompany);
		}
		return $companies;
	}


}