<?php

namespace App\Http\Controllers\Admin\Option;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Option;
use App\Models\OptionFilter;
use App\Models\OptionType;
use App\Models\OptionBrand;
use App\Models\Brand;
use App\Http\Requests\Admin\OptionCreateRequest;
use App\Http\Requests\Admin\OptionFilterRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OptionFilterRequest $request)
    {
        $query = Option::with(['filter','type','brands.brand'])->select('options.*')->leftJoin('option_brands','option_brands.option_id','options.id');
        foreach ($request->only([]) as $key => $value) {
            # code...
        }
        $options = $query->groupBy('options.id')->orderBy('type_id')->get();
        return view('admin.option.index', compact('options')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filters = OptionFilter::get()->pluck('name','id');
        $types = OptionType::get()->pluck('name','id');;
        $brands = Brand::get()->pluck('name','id');
        return view('admin.option.add',compact('filters','types','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionCreateRequest $request)
    {
        $option = Option::create([
            'name' => $request->get('name'),
            'type_id' => $request->get('type_id'),
            'filter_id' => $request->get('filter_id')
        ]);
        foreach($request->get('brand_ids') as $itemId)
            OptionBrand::create([
                'option_id' => $option->id,
                'brand_id' => $itemId
            ]);
        return redirect()->route('options.edit',$option)->with('status','Новое оборудование записано');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Option $option)
    {
        return redirect()->route('options.edit',$option);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        $filters = OptionFilter::get()->pluck('name','id');;
        $types = OptionType::get()->pluck('name','id');;
        $brands = Brand::get()->pluck('name','id');
        return view('admin.option.add',compact('filters','types','option','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionCreateRequest $request, Option $option)
    {
        $option->update($request->except('brand_ids'));
        OptionBrand::where('option_id',$option->id)->delete();
        foreach($request->get('brand_ids') as $itemId)
            OptionBrand::create([
                'option_id' => $option->id,
                'brand_id' => $itemId
            ]);
        return redirect()->route('options.edit',$option)->with('status','Оборудование перезаписано');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Option $option)
    {
        //
    }
}
