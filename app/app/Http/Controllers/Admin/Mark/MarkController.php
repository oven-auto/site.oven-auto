<?php

namespace App\Http\Controllers\Admin\Mark;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Brand;
use App\Models\Body;
use App\Models\Country;
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
    	return view('admin.mark.add',compact('bodies','brands','countries','title'));
    }

    public function store(MarkCreateRequest $request)
    {
    	$mark = Mark::create($request->except(['icon','alpha','banner','brochure','manual','price','toy']));

    	$mark->update($this->UploadService->store($request->only(['icon','alpha','banner']), $mark));

    	/*DOCUMENTS*/
    	$mark->documents->save(['mark_id'=>$mark->id]);
    	$mark->documents->fill($this->UploadService->store($request->only(['brochure','manual','price','toy']), $mark->documents));
    	$mark->documents->save();

    	return redirect()->route('marks.edit',$mark)->with('status','Новая модель добавлена');
    }

    public function edit(Mark $mark)
    {
    	$title = 'Модель: '.$mark->name;
    	$bodies = Body::get()->pluck('name','id');
    	$brands = Brand::get()->pluck('name','id');
    	$countries = Country::select(DB::raw('id,name,city,CONCAT_WS(" ",name,city) as list'))->groupBy('id')->get()->pluck('list','id');
    	return view('admin.mark.add',compact('bodies','brands','countries','mark','title'));
    }

    public function update(MarkUpdateRequest $request,Mark $mark)
    {
    	$mark->update($request->except(['icon','alpha','banner','brochure','manual','price','toy']));

    	/*PICTURES*/
    	$mark->update($this->UploadService->store($request->only(['icon','alpha','banner']), $mark));

        /*DOCUMENTS*/
    	$mark->documents->save(['mark_id'=>$mark->id]);
    	$mark->documents->fill($this->UploadService->store($request->only(['brochure','manual','price','toy']), $mark->documents));
    	$mark->documents->save();

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
