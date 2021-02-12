<?php
namespace App\Services\Company;
use App\Models\Company;
use App\Models\Mark;
use App\Models\Complect;
use App\Models\Transmission;
use App\Models\Driver;
use DB;
Class CompanyService
{
	private $company = null;

	public function __construct()
	{
		$this->company = app(Company::class);
	}

	public function getModelsForSelect()
	{
		$models = Mark::orderBy('brand_id')
            ->orderBy('body_id')
            ->orderBy('name')
            ->get()
            ->pluck('name','id');
        return $models;
	}

	public function getComplectsForSelect()
	{
		$complects = Complect::select('complects.id',
				DB::raw(
					'concat(complects.code," ",marks.name," ",complects.name," ",round(motors.size/1000,1)," (",motors.power,") ",transmissions.name," ",drivers.name ) as name'
				)
			)
			->leftJoin('marks','marks.id','=','complects.mark_id')
			->leftJoin('motors','motors.id','=','complects.motor_id')
			->leftJoin('transmissions','transmissions.id','=','motors.transmission_id')
			->leftJoin('drivers','drivers.id','=','motors.driver_id')
			->orderBy('marks.brand_id')
			->orderBy('complects.mark_id')
			->get()
			->pluck('name','id')
			->toArray();
		return $complects;
	}

	public function getTransmissionsForSelect()
	{
		$transmissions = Transmission::get()->pluck('name','id')->toArray();
		return $transmissions;
	}

	public function getDriversForSelect()
	{
		$drivers = Driver::get()->pluck('name','id')->toArray();
		return $drivers;
	}

	public function getCompanyScenariosList()
	{
		$scenarios = app(\App\Models\CompanyScenario::class)->get()->pluck('name','id');
		return $scenarios;
	}

	public function getCompanySectionsList()
	{
		$sections = app(\App\Models\CompanySection::class)->get()->pluck('name','id');
		return $sections;
	}

	public function getCompanyById($id):Company
	{
		$result = $this->company->find($id);
		if($result)
			return $result;
		abort(404,'Такой коммерческой акции нет');
	}

	public function setCompany($id)
	{
		switch ($id) {
			case 1:
				return app(Calculate::class);
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


}