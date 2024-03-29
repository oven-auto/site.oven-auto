<?php

namespace App\Http\Controllers\Admin\Complect;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complect;
use App\Models\ComplectOption;
use App\Models\ComplectPack;
use App\Models\Brand;
use App\Models\Mark;
use App\Models\Motor;
use App\Models\Option;
use App\Models\Pack;
use App\Http\Requests\Admin\ComplectCreateRequest;

class ComplectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response id_model,sort,price,parent,name
     */
    public function index(Request $request)
    {
        $query = Complect::with(['mark','options.option','packs.pack','motor','brand']);        
        if($request->has('code') && $request->get('code'))
            $query->where('code',$request->get('code'));
        if($request->has('name') && $request->get('name'))
            $query->where('name',$request->get('name'));
        if($request->has('status') && $request->get('status')!='')
            $query->where('status',$request->get('status'));
        if($request->has('mark_id') && $request->get('mark_id'))
            $query->where('mark_id',$request->get('mark_id'));

        $complects = $query
            ->orderBy('mark_id')
            ->orderBy('parent_id')
            ->get();
        $marks = Mark::orderBy('brand_id')->orderBy('name')->get()->pluck('name','id');
        $statuses = [1=>'Только включенные',0=>'Только выключенные'];
        return view('admin.complect.index',compact('complects','marks','statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get()->pluck('name','id');        
        return view('admin.complect.add',compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplectCreateRequest $request)
    {
        $dataComplect = $request->only(['name','code','price','brand_id','motor_id','mark_id']);
        //$dataComplect['mark_id'] = $request->get('mark_ids')[0];
        $complect = Complect::create($dataComplect);

        if($request->has('option_ids'))
            foreach($request->get('option_ids') as $itemOptionId) :
                ComplectOption::create([
                    'complect_id'=>$complect->id,
                    'option_id'=>$itemOptionId
                ]);
            endforeach;

        if($request->has('pack_ids'))
            foreach($request->get('pack_ids') as $itemPackId) :
                ComplectPack::create([
                    'complect_id'=>$complect->id,
                    'pack_id'=>$itemPackId
                ]);
            endforeach;

        if($request->has('color_id'))
        {
            foreach ($complect->complectcolors as $key => $itemComplectColor) 
                $itemComplectColor->colorpacks()->delete();

            $complect->complectcolors()->delete();
            foreach ($request->get('color_id') as $key => $color_id) 
                if($request->has('pack_id') && array_key_exists($color_id, $request->get('pack_id')))
                {
                    $complectColor = $complect->complectcolors()->create([
                        'color_id'=>$color_id
                    ]);
                    foreach ($request->get('pack_id')[$color_id] as $i => $pack_id) {
                        $complectColor->colorpacks()->create([
                            'pack_id'=>$pack_id
                        ]);
                    }
                }
                else
                    $complect->complectcolors()->create([
                        'color_id'=>$color_id
                    ]);
        }
            
        return redirect()->route('complects.edit',$complect)->with('status','Новая комплектация создана');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Complect $complect)
    {
        return redirect()->route('complects.edit',$complect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($complect)
    {   
        $complect = Complect::with(['complectcolors.colorpacks','modelcolors.color'])->find($complect);
        $brands = Brand::get()->pluck('name','id'); 
        $marks = Mark::where('brand_id',$complect->brand_id)->get()->pluck('name','id');
        $motors = Motor::with('transmission','driver','type')->where('brand_id',$complect->brand_id)->get();      
        if($motors->count())
        {
            $tmp = [];
            foreach ($motors as $key => $itemMotor) {
                $tmp[$itemMotor->id] = $itemMotor->fullName;
            }
            $motors = $tmp;
        }
        $options = Option::select('options.*')
            ->with(['type'])
            ->leftJoin('option_brands','option_brands.option_id','options.id')
            ->where('option_brands.brand_id',$complect->brand_id)
            ->orderBy('options.type_id')
            ->orderBy('options.name')
            ->groupBy('options.id')
            ->get()
            ->groupBy('type_id');
        $packs = Pack::select('packs.*')
                ->with('options.option')
                ->leftJoin('pack_marks','pack_marks.pack_id','=','packs.id')
                ->where('pack_marks.mark_id',$complect->mark_id)
                ->get();
        $colorPacks = $packs->where('colored',1)->pluck('code','id');
        return view('admin.complect.add',compact('brands','complect','marks','motors','options','packs','colorPacks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ComplectCreateRequest $request, Complect $complect)
    {   
        $dataComplect = $request->only(['name','code','price','brand_id','motor_id','mark_id']);
        //$dataComplect['mark_id'] = $request->get('mark_ids')[0];
        $complect->update($dataComplect);

        ComplectOption::where('complect_id',$complect->id)->delete();
        foreach($request->get('option_ids') as $itemOptionId) :
            ComplectOption::create([
                'complect_id'=>$complect->id,
                'option_id'=>$itemOptionId
            ]);
        endforeach;

        if($request->has('pack_ids') && $request->get('pack_ids'))
            ComplectPack::where('complect_id',$complect->id)->delete();
            foreach($request->get('pack_ids') as $itemPackId) :
                ComplectPack::create([
                    'complect_id'=>$complect->id,
                    'pack_id'=>$itemPackId
                ]);
            endforeach;

        if($request->has('color_id'))
        {
            foreach ($complect->complectcolors as $key => $itemComplectColor) 
                $itemComplectColor->colorpacks()->delete();

            $complect->complectcolors()->delete();
            foreach ($request->get('color_id') as $key => $color_id) 
                if($request->has('pack_id') && array_key_exists($color_id, $request->get('pack_id')))
                {
                    $complectColor = $complect->complectcolors()->create([
                        'color_id'=>$color_id
                    ]);
                    foreach ($request->get('pack_id')[$color_id] as $i => $pack_id) {
                        $complectColor->colorpacks()->create([
                            'pack_id'=>$pack_id
                        ]);
                    }
                }
                else
                    $complect->complectcolors()->create([
                        'color_id'=>$color_id
                    ]);
        }
        return redirect()->route('complects.edit',$complect)->with('status','Комплектация изменена');
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
