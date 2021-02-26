<?php
namespace App\Services\FrontData;
use App\Models\Mark;
use App\Models\Banner;
use App\Models\Body;
use DB;
Class FrontDataService
{
	public function getModelsForTabs($data = array())
	{
		$models = Mark::select(['marks.*',DB::raw('count(Distinct cars.id) as countCars'),DB::raw('min(complects.price) as minPrice')])
			->with(['body'])
			->leftJoin('complects','complects.mark_id','=','marks.id')
			->leftJoin('cars','cars.mark_id','=','marks.id')
			->where('marks.status',1)
			->groupBy('marks.id')
			->orderBy('marks.sort')
			->get();
		return $models;
	}

	public function getBanners()
	{
		$banners = Banner::orderBy('sort')->get();
		return $banners;
	}

	public function getBodies()
	{
		$bodies = Body::get();
		return $bodies;
	}
}