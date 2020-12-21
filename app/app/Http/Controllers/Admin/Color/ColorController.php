<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Brand;
use App\Http\Requests\Admin\ColorRequest;
use App\Http\Requests\Admin\ColorFilterRequest;
use Session;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorFilterRequest $request)
    {
        $query = Color::with('brand');
        foreach ($request->only(['name','brand_id','code']) as $key => $value) 
            if($value)
                if(is_numeric($value) && $key!=='code')
                    $query->where($key,$value);
                else
                    $query->where($key,'LIKE','%'.$value.'%');
        
        $colors = $query->paginate(25);
        $brands = Brand::get()->pluck('name','id');
        Session::put('filter.color',route('colors.index',$request->query()));    
        return view('admin.color.index',compact('colors','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get()->pluck('name','id');
        return view('admin.color.add',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorRequest $request)
    {
        $color = Color::create([
            'name'=>$request->get('name'),
            'code'=>$request->get('code'),
            'brand_id'=>$request->get('brand_id'),
            'web'=>implode(',',$request->colors)
        ]);
        return redirect()->route('colors.edit',$color)->with('status','Новый цвет добавлен');
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
    public function edit(Color $color)
    {
        $brands = Brand::get()->pluck('name','id');
        return view('admin.color.add',compact('brands','color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColorRequest $request, Color $color)
    {
        $color->update([
            'name'=>$request->get('name'),
            'code'=>$request->get('code'),
            'brand_id'=>$request->get('brand_id'),
            'web'=>implode(',',$request->colors)
        ]);
        return redirect()->route('colors.edit',$color)->with('status','Цвет изменен');
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
