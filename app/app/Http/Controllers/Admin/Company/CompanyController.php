<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
use App\Models\Mark;
use App\Http\Requests\Admin\CompanyCreateRequest;

class CompanyController extends Controller
{
    
    public $service = null;

    public function __construct()
    {
        $this->service = new CompanyService();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = new CompanyService();
        dd($service->getCompanyById(1));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = $this->service->getModelsForSelect();
        $complects = $this->service->getComplectsForSelect();
        $transmissions = $this->service->getTransmissionsForSelect();
        $drivers = $this->service->getDriversForselect();
        $scenarios = $this->service->getCompanyScenariosList();
        $sections = $this->service->getCompanySectionsList();
        return view('admin.company.create', compact('scenarios','models','complects','transmissions','drivers','sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyCreateRequest $request)
    {
        dd($request->input());
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
    public function edit($id)
    {
        //
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
