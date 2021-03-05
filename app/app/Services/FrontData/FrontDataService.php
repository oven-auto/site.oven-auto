<?php
namespace App\Services\FrontData;
use App\Models\Mark;
use App\Models\Banner;
use App\Models\Body;
use DB;
use App\Models\Car;
use App\Models\Complect;
use Illuminate\Database\Eloquent\Builder;
Class FrontDataService
{	
	//для того что бы вернуть модели для табов на главной
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

	//вернёт данные о модели 
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
	//вернёт комплектации для модели
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

	public function getTestCarByModel($model)
	{
		$query = Car::select('cars.*', DB::raw('mark_colors.img as img'))
    		->with(['color:name','brand:name','mark:name','complect.motor'])
    		->leftJoin('mark_colors',function($join){
    			$join->on('mark_colors.color_id','=','cars.color_id')
    				->on('mark_colors.mark_id','=','cars.mark_id');
    		})
    		->where('cars.delivery_id',2)
    		->where('cars.mark_id',$model->id);
    	$cars = $query->first();
    	return $cars;
	}

	public function getCars($data = array())
	{
		$query = Car::select('cars.*', DB::raw('mark_colors.img as img'))
    		->with(['prodaction','receiving','color','brand','mark','complect.motor'])
    		->leftJoin('mark_colors',function($join){
    			$join->on('mark_colors.color_id','=','cars.color_id')
    				->on('mark_colors.mark_id','=','cars.mark_id');
    		});
    	if(isset($data['complect_id']) && is_numeric($data['complect_id']))
    		$query->where('complect_id',$data['complect_id']);
    	$cars = $query->get();
    	return $cars;
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