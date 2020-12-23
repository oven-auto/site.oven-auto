<?php

namespace App\Http\Controllers\Admin\Pack;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pack;
use App\Models\PackMark;
use App\Models\PackOption;
use App\Models\Mark;
use App\Models\Option;
use App\Models\OptionBrand;
use App\Models\Brand;
use App\Http\Requests\Admin\PackCreateRequest;
use App\Http\Requests\Admin\PackFilterRequest;
use Session;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PackFilterRequest $request)
    {
        $query = Pack::with(['brand','marks.mark','options.option'])->select('packs.*')->leftJoin('pack_options','pack_options.pack_id','packs.id')->leftJoin('pack_marks','pack_marks.pack_id','packs.id');        
        $having = 0;
        if($request->has('name') && $request->get('name'))
        {
            $query->where('packs.name','LIKE','%'.$request->get('name').'%');
            $having+=1;
        }
        if($request->has('code') && $request->get('code'))
        {
            $query->where('packs.code','LIKE','%'.$request->get('code').'%');
            $having+=1;
        }
        if($request->has('price') && $request->get('price'))
        {
            $query->where('packs.price',$request->get('price'));
            $having+=1;
        }
        if($request->has('mark_id') && $request->get('mark_id'))
        {
            $query->where('pack_marks.mark_id',$request->get('mark_id'));
            $having+=1;
        }
        if($request->has('brand_id') && $request->get('brand_id'))
        {
            $query->where('packs.brand_id',$request->get('brand_id'));
            $having+=1;
        }
        if($request->has('option_id') && $request->get('option_id'))
        {
            $query->whereIn('pack_options.option_id',explode(',',$request->get('option_id')));
            $having+=count(explode(',',$request->get('option_id')));
        }

        $packs = $query->groupBy('packs.id')->havingRaw('count(packs.id) >= '.$having)->get();
        $brands = Brand::get()->pluck('name','id');
        $marks = Mark::get()->pluck('name','id');
        Session::put('filter.pack',route('packs.index',$request->query()));   
        return view('admin.pack.index',compact('packs','marks','brands'));
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
        return redirect()->route('packs.edit',$pack)->with('status','Новая опция добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pack $pack)
    {
        return redirect()->route('packs.edit',$pack);
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
        $options = Option::select('options.*')
            ->leftJoin('option_brands','option_brands.option_id','options.id')
            ->where('option_brands.brand_id',$pack->brand_id)
            ->orderBy('options.type_id')
            ->orderBy('options.name')
            ->groupBy('options.id')
            ->get()
            ->groupBy('type_id');
        return view('admin.pack.add',compact('brands','pack','marks','options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackCreateRequest $request, Pack $pack)
    {
        $pack->update($request->only('name','code','price','brand_id'));
        
        PackMark::where('pack_id',$pack->id)->delete();
        foreach ($request->get('mark_ids') as $key => $markId) 
            PackMark::create([
                'pack_id'=>$pack->id,
                'mark_id'=>$markId
            ]);

        PackOption::where('pack_id',$pack->id)->delete();
        foreach ($request->get('option_ids') as $key => $optionId) 
            PackOption::create([
                'pack_id'=>$pack->id,
                'option_id'=>$optionId
            ]);
        return redirect()->route('packs.edit',$pack)->with('status','Опция перезаписана');
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
