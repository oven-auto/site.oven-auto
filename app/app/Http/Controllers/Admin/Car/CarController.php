<?php

namespace App\Http\Controllers\Admin\Car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CarCreateRequest;
use App\Models\Car;
use App\Models\CarPack;
use App\Models\CarOption;
use App\Models\CarProdaction;
use App\Models\Option;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $carColumns = ['delivery_id','author_id','marker_id','year','vin','brand_id','mark_id','complect_id','color_id'];
    private $carProdColumns = ['order_date','ship_date','build_date', 'ready_date', 'order_number'];

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = \App\Models\Brand::get()->pluck('name','id');
        $deliveryTypes = \App\Models\DeliveryType::get()->pluck('name','id');
        $logistMarkers= \App\Models\LogistMarker::get()->pluck('name','id');
        return view('admin.car.add',compact('brands','deliveryTypes','logistMarkers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarCreateRequest $request)
    {
        $car = Car::create($request->only($this->carColumns));

        if($request->get('pack_ids'))
            foreach($request->get('pack_ids') as $itemPackId) 
                CarPack::create([
                    'car_id'=>$car->id,
                    'pack_id'=>$itemPackId
                ]);

        if($request->get('option_ids'))
            foreach($request->get('option_ids') as $itemOptionId) 
                CarOption::create([
                    'car_id'=>$car->id,
                    'option_id'=>$itemOptionId
                ]);

        $productionData = $request->only($this->carProdColumns);
        $productionData['car_id'] = $car->id;
        $productionData['user_id'] = $car->author_id;
        CarProdaction::create($productionData);

        return redirect()->route('cars.edit',$car)->with('status','Новый автомобиль добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = \App\Models\Brand::get()->pluck('name','id');
        $deliveryTypes = \App\Models\DeliveryType::get()->pluck('name','id');
        $logistMarkers= \App\Models\LogistMarker::get()->pluck('name','id');
        $marks = \App\Models\Mark::where('brand_id',$car->brand_id)->get()->pluck('name','id');
        $complects = \App\Models\Complect::where('mark_id',$car->mark_id)->get()->pluck('name','id');
        $options = Option::select('options.*')
            ->leftJoin('option_brands','option_brands.option_id','options.id')
            ->where('option_brands.brand_id',$car->brand_id)
            ->orderBy('options.type_id')
            ->orderBy('options.name')
            ->groupBy('options.id')
            ->get()
            ->groupBy('type_id');
        return view('admin.car.add',compact('brands','deliveryTypes','logistMarkers','car','marks','complects','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarCreateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
