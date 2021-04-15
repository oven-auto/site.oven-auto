<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Brand;
use App\Models\Body;
use App\Models\Country;
use App\Models\Property;
use App\Models\MarkProperty;
use App\Models\MarkColor;
use DB;
use Storage;
use App\Http\Requests\Admin\MarkCreateRequest;
use App\Http\Requests\Admin\MarkUpdateRequest;
use App\Services\UploadService;
class MarkController extends Controller
{
	private $UploadService;

	public function __construct()
	{
		$this->UploadService = new UploadService();
	}

    public function index()
    {
    	$marks = Mark::with(['brand','body','country'])->get();
    	return view('admin.mark.index',compact('marks'));
    }

    public function create()
    {
    	$title = 'Новая модель';
    	$bodies = Body::get()->pluck('name','id');
    	$brands = Brand::get()->pluck('name','id');
    	$countries = Country::select(DB::raw('id,name,city,CONCAT_WS(" ",name,city) as list'))->groupBy('id')->get()->pluck('list','id');
    	$properties = Property::get();
    	return view('admin.mark.add',compact('bodies','brands','countries','title','properties'));
    }

    public function store(MarkCreateRequest $request)
    {
    	$mark = Mark::create($request->except(['icon','alpha','banner','brochure','manual','price','toy','properties','colors_ids']));

    	$mark->update($this->UploadService->store($request->only(['icon','alpha','banner']), $mark));

    	/*DOCUMENTS*/
    	$mark->documents->save(['mark_id'=>$mark->id]);
    	$mark->documents->fill($this->UploadService->store($request->only(['brochure','manual','price','toy']), $mark->documents));
    	$mark->documents->save();

    	foreach($request->get('properties') as $key=>$value)
    	{
    		MarkProperty::create([
    			'mark_id'=>$mark->id,
    			'property_id'=>$key,
    			'value'=>$value
    		]);
    	}

        $imgs = $this->UploadService->store($request->file('color_id'),$mark);
        if(!empty($imgs))
        {
            foreach ($imgs as $key => $itemImg)
                $mark->colors()->create([
                    'color_id'=>$key,
                    'img'=>$itemImg
                ]);
        }
        
    	return redirect()->route('marks.edit',$mark)->with('status','Новая модель добавлена');
    }

    public function edit(Mark $mark)
    {
    	$title = 'Модель: '.$mark->name;
    	$bodies = Body::get()->pluck('name','id');
    	$brands = Brand::get()->pluck('name','id');
    	$countries = Country::select(DB::raw('id,name,city,CONCAT_WS(" ",name,city) as list'))->groupBy('id')->get()->pluck('list','id');
    	$properties = Property::get();
    	return view('admin.mark.add',compact('bodies','brands','countries','mark','title','properties'));
    }

    public function update(MarkUpdateRequest $request,Mark $mark)
    {   
    	$mark->update($request->except(['icon','alpha','banner','brochure','manual','price','toy','properties','colors_ids','hidden_ids']));

    	/*PICTURES*/
    	$mark->update($this->UploadService->store($request->only(['icon','banner']), $mark));

        /*DOCUMENTS*/
    	$mark->documents->save(['mark_id'=>$mark->id]);
    	$mark->documents->fill($this->UploadService->store($request->only(['brochure','manual','price','toy']), $mark->documents));
    	$mark->documents->save();

    	foreach($request->get('properties') as $key=>$value)
    	{
    		if(isset($mark->properties) && $mark->properties->contains('property_id',$key))
    			$mark->properties->where('property_id',$key)->first()->update(['value'=>$value]);
    		else
    			MarkProperty::create([
    				'mark_id'=>$mark->id,
    				'property_id'=>$key,
    				'value'=>$value
    			]);
    	}

       
        $imgs = $this->UploadService->store($request->file('colors_ids'),$mark);

        if(is_array($imgs))
        {
            foreach ($imgs as $color_id => $img) 
                if($mark->colors->contains('color_id',$color_id))
                    $mark->colors()->where('color_id',$color_id)->first()->update([
                        'img'=>$img
                    ]);
                else
                    $mark->colors()->create([
                        'color_id'=>$color_id,
                        'img'=>$img
                    ]);
            $hidden = $request->get('hidden_ids');
            $hidden = $mark->colors->whereNotIn('color_id',$hidden);
            foreach ($hidden as $key => $item) 
                $item->delete();
        }
        
    	return redirect()->route('marks.edit',$mark)->with('status','Модель обновлена');
    }

    public function show(Mark $mark)
    {
    	return redirect()->route('marks.edit',$mark);
    }

    public function delete(Mark $mark)
    {

    }
}
