<?php

namespace App\Http\Controllers\Admin\Pack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\PackMark;
use App\Models\PackOption;
use App\Models\Mark;
use App\Models\Option;
use App\Models\Brand;
use App\Http\Requests\Admin\PackCreateRequest;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packs = Pack::with(['brand','marks','options'])->get();
        dd($packs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get()->pluck('name','id');
        return view('admin.pack.add',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackCreateRequest $request)
    {
        $pack = Pack::create($request->only('name','code','price','brand_id'));
        foreach ($request->get('mark_ids') as $key => $markId) 
            PackMark::create([
                'pack_id'=>$pack->id,
                'mark_id'=>$markId
            ]);
        foreach ($request->get('option_ids') as $key => $optionId) 
            PackOption::create([
                'pack_id'=>$pack->id,
                'option_id'=>$optionId
            ]);
        
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
    public function edit(Pack $pack)
    {
        $brands = Brand::get()->pluck('name','id');
        $marks = Mark::where('brand_id',$pack->brand_id)->get()->pluck('name','id');
        return view('admin.pack.add',compact('brands','pack','marks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
