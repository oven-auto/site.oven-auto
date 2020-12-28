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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complects = Complect::with(['mark','options.option','packs.pack','motor','brand'])->get();
        return view('admin.complect.index',compact('complects'));
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
        $dataComplect = $request->only(['name','code','price','brand_id','motor_id']);
        $dataComplect['mark_id'] = $request->get('mark_ids')[0];
        $complect = Complect::create($dataComplect);

        foreach($request->get('option_ids') as $itemOptionId) :
            ComplectOption::create([
                'complect_id'=>$complect->id,
                'option_id'=>$itemOptionId
            ]);
        endforeach;

        foreach($request->get('pack_ids') as $itemPackId) :
            ComplectPack::create([
                'complect_id'=>$complect->id,
                'pack_id'=>$itemPackId
            ]);
        endforeach;
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
    public function edit(Complect $complect)
    {
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
            ->leftJoin('option_brands','option_brands.option_id','options.id')
            ->where('option_brands.brand_id',$complect->brand_id)
            ->orderBy('options.type_id')
            ->orderBy('options.name')
            ->groupBy('options.id')
            ->get()
            ->groupBy('type_id');
        $packs = Pack::with('options.option')->where('brand_id',$complect->brand_id)->get();
        return view('admin.complect.add',compact('brands','complect','marks','motors','options','packs'));
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
        $dataComplect = $request->only(['name','code','price','brand_id','motor_id']);
        $dataComplect['mark_id'] = $request->get('mark_ids')[0];
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
