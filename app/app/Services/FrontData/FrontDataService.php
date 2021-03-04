<?php
namespace App\Services\FrontData;
use App\Models\Mark;
use App\Models\Banner;
use App\Models\Body;
use DB;
use App\Models\Complect;
use Illuminate\Database\Eloquent\Builder;
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

	public function getModelForPriceList($slug)
	{
		$model = Mark::select(['marks.*',DB::raw('count(Distinct cars.id) as countCars'),DB::raw('min(complects.price) as minPrice')])
			->with(['body','properties.property','credits','colors.color','brand'])
			->leftJoin('complects','complects.mark_id','=','marks.id')
			->leftJoin('cars','cars.mark_id','=','marks.id')
			->groupBy('marks.id')
			->orderBy('marks.sort')
			->where('marks.slug',$slug)
			->first();
		return $model;
	}

	public function getComplectsByModel($model)
	{
		$complects = Complect::select('complects.*',DB::Raw('count(cars.id) as carCount'))
			->with('motor')
			->leftJoin('cars','cars.complect_id','=','complects.id')
			->where('complects.mark_id',$model->id)
			->Where(function($query){
				$query->where('complects.status','=',1)
					->orWhere(DB::Raw('(SELECT count(c.id) FROM cars as c WHERE c.complect_id = complects.id)'),'>',0);
			})
			->groupBy('complects.id')
			->get();
			return $complects;
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