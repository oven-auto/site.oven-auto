<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\Admin\BrandCreateRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandCreateRequest $request)
    {
        $path = $request->file('icon')->store('brands');
        $brand = Brand::create([
            'name'=>$request->get('name'),
            'icon'=>$path
        ]);
        return redirect()->route('brands.edit',$brand)->with('status','Бренд добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return redirect()->route('brands.edit',$brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.add',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request,Brand $brand)
    {
        $path = $brand->icon;
        if($request->has('icon'))
        {
            Storage::delete($brand->icon);
            $path = $request->file('icon')->store('brands');
        }

        $brand->update([
            'name'=>$request->get('name'),
            'icon'=>$path
        ]);
        return redirect()->route('brands.edit',$brand)->with('status','Бренд обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
    }
}
