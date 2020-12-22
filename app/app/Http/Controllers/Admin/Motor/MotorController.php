<?php

namespace App\Http\Controllers\Admin\Motor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motor;
use App\Models\Driver;
use App\Models\MotorType;
use App\Models\Transmission;
use App\Models\Brand;
use App\Http\Requests\Admin\MotorCreateRequest;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = Motor::with(['type','driver','transmission'])->get();
        return view('admin.motor.index',compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::get()->pluck('name','id');
        $drivers = Driver::get()->pluck('name','id');
        $types = MotorType::get()->pluck('name','id');
        $transmissions = Transmission::get()->pluck('name','id');
        return view('admin.motor.add',compact('transmissions','drivers','types','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MotorCreateRequest $request)
    {
        $motor = Motor::create($request->input());
        return redirect()->route('motors.edit',$motor)->with('status','Новый мотор создан');
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
    public function edit(Motor $motor)
    {
        $brands = Brand::get()->pluck('name','id');
        $drivers = Driver::get()->pluck('name','id');
        $types = MotorType::get()->pluck('name','id');
        $transmissions = Transmission::get()->pluck('name','id');
        return view('admin.motor.add',compact('transmissions','drivers','types','brands','motor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MotorCreateRequest $request, Motor $motor)
    {
        $motor->update($request->input());
        return redirect()->route('motors.edit',$motor)->with('status','Мотор перезаписан');
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
