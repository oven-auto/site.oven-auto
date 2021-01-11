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
use App\User;
use DB;
use App\Repositories\CarRepository;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $carColumns = ['delivery_id','author_id','marker_id','year','vin','brand_id','mark_id','complect_id','color_id'];
    private $carProdColumns = ['order_date','ship_date','build_date', 'ready_date', 'order_number'];
    
    // private $carRep;

    // public function __construct(CarRepository $carRep)
    // {
    //     $this->carRep = $carRep;
    // }

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
        $authors = User::get()->pluck('name','id');
        return view('admin.car.add',compact('brands','deliveryTypes','logistMarkers','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarCreateRequest $request)
    {
        try
        {
            $car = DB::transaction(function() use ($request)
            {
                $car = Car::create($request->only($this->carColumns));
                if($request->get('pack_ids'))
                    foreach($request->get('pack_ids') as $itemPackId) 
                        $car->packs()->create(['pack_id'=>$itemPackId]);
                if($request->get('option_ids'))
                    foreach($request->get('option_ids') as $itemOptionId) 
                        $car->options()->create(['option_id'=>$itemOptionId]);
                $car->prodaction()->create(array_merge(['user_id'=>$car->author_id],$request->only($this->carProdColumns)));
                return $car;
            });          
        }
        catch(Exception $e)
        {
            return redirect()->route('cars.create')->with('status','Ошибка. Автомобиль не добавлен');
        }
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
        $authors = User::get()->pluck('name','id');
        return view('admin.car.add',compact('brands','deliveryTypes','logistMarkers','car','marks','complects','options','authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarCreateRequest $request, Car $car)
    {
        try
        {
            DB::transaction(function() use ($request, & $car)
            {
                $car->update($request->only($this->carColumns));

                $car->packs()->delete();
                if($request->get('pack_ids'))
                    foreach($request->get('pack_ids') as $itemPackId) 
                        $car->packs()->create(['pack_id'=>$itemPackId]);

                $car->options()->delete();
                if($request->get('option_ids'))
                    foreach($request->get('option_ids') as $itemOptionId) 
                        $car->options()->create(['option_id'=>$itemOptionId]);

                if(isset($car->prodaction->id))
                    $car->prodaction()->update(array_merge(['user_id'=>$car->author_id],$request->only($this->carProdColumns)));
                else
                    $car->prodaction()->create(array_merge(['user_id'=>$car->author_id],$request->only($this->carProdColumns)));
            });          
        }
        catch(Exception $e)
        {
            return redirect()->route('cars.create')->with('status','Ошибка. Автомобиль не изменен');
        }
        return redirect()->route('cars.edit',$car)->with('status','Автомобиль изменен');
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
