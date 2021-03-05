<?php
namespace App\Services\FrontData;
use App\Models\Mark;
use App\Models\Banner;
use App\Models\Body;
use DB;
use App\Models\Car;
use App\Models\Complect;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

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
		$dataCount = 0;
		foreach ($data as $key => $value) {
			if(is_string($value) && !empty($value))
				$dataCount+=1;
			if(is_array($value) && !empty($value))
				$dataCount+=count($value);
		}
		$query = Car::select('cars.*', DB::raw('mark_colors.img as img'))
    		->with(['prodaction','receiving','color','brand','mark','complect.motor'])
    		->leftJoin('mark_colors',function($join){
    			$join->on('mark_colors.color_id','=','cars.color_id')
    				->on('mark_colors.mark_id','=','cars.mark_id');
    		});
    	$query->leftJoin('complects','complects.id','=','cars.complect_id');
    	$query->leftJoin('motors','motors.id','=','complects.motor_id');

    	if(isset($data['complect_id']) && is_numeric($data['complect_id']))
    		$query->where('cars.complect_id',$data['complect_id']);
    	if(isset($data['mark_id']) && is_numeric($data['mark_id']))
    		$query->where('cars.mark_id',$data['mark_id']);

    	if(isset($data['transmission_type']) && is_numeric($data['transmission_type']))
    	{
    		$query->leftJoin('transmissions','transmissions.id','=','motors.transmission_id');
    		$query->where('transmissions.type',$data['transmission_type']);
    	}
    	if(isset($data['driver_type']) && is_numeric($data['driver_type']))
    	{
    		$query->leftJoin('drivers','drivers.id','=','motors.driver_id');
    		$query->where('drivers.type',$data['driver_type']);
    	}
    	if(isset($data['option_ids']) && is_array($data['option_ids']))
    	{
    		// $query->leftJoin('complect_options','complect_options.complect_id','=','complects.id');
    		// $query->leftJoin('car_packs','car_packs.car_id','=','cars.id');
    		// $query->leftJoin('pack_options','pack_options.pack_id','=','car_packs.pack_id');
    		// $query->leftJoin('options',function($join){
    		// 	$join->on('options.id','=','pack_options.option_id')
    		// 		->orOn('options.id','=','complect_options.option_id');
    		// });
    		$query->leftJoin('view_car_options','view_car_options.car_id','=','cars.id');
    		$query->groupBy('cars.id');
    		$query->having(DB::Raw('count(cars.id)'),'>=',$dataCount);
    		$query->whereIn('view_car_options.filter_id',$data['option_ids']);
    	}
    	$query->orderBy('cars.mark_id');
    	$cars = $query->simplePaginate(15);
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

	public function getCarCount()
	{
		$count = Car::select(DB::Raw('count(id) as count'))
			->where('delivery_id',1)
			->pluck('count');
		return $count[0];
	}

	public function pluck($model,$params = array('id'),$where = array())
	{
		$result = [];
		$paramCount = count($params);
		if($paramCount>2)
			return [];
		$className = "\App\Models\\".$model;
		$classStatus = class_exists($className);

		if($classStatus)
		{
			$class = app($className);
			if($where)
				foreach ($where as $key => $value) {
					$class = $class->where($key,$value);
				}
			if($paramCount==1)
				$result = $class->pluck($params[0]);
			if($paramCount==2)
				$result = $class->pluck($params[0],$params[1]);
			return $result;
		}
		return $result;
	}

	public function transmissionType()
	{
		return [1=>'Механическая',2=>'Автоматическая'];
	}
	public function driverType()
	{
		return [1=>'Передний',2=>'Полный'];
	}
	public function deliveryStage()
	{
		return [1=>'На складе',2=>'Готов к отгрузке',3=>'В производстве'];
	}
}