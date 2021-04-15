<?php
namespace App\Facades\DataForSelect;
use Illuminate\Support\Facades\Facade;
use DB;

Class DataForSelect extends Facade
{
	protected static function test()
    {
        return 'test';
    }

    public function getModels()
	{
		$models = \App\Models\Mark::orderBy('brand_id')
            ->orderBy('body_id')
            ->orderBy('name')
            ->get()
            ->pluck('name','id')
            ->toArray();
        return $models;
	}

	public function getComplects()
	{
		$complects = \App\Models\Complect::select('complects.id',
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

	public function getTransmissions()
	{
		$transmissions = \App\Models\Transmission::get()->pluck('name','id')->toArray();
		return $transmissions;
	}

	public function getDrivers()
	{
		$drivers = \App\Models\Driver::get()->pluck('name','id')->toArray();
		return $drivers;
	}

	public function getCompanyScenarios()
	{
		$scenarios = app(\App\Models\CompanyScenario::class)->get()->pluck('name','id')->toArray();
		return $scenarios;
	}

	public function getCompanySections()
	{
		$sections = app(\App\Models\CompanySection::class)->get()->pluck('name','id')->toArray();
		return $sections;
	}
}