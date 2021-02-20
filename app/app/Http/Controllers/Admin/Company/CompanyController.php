<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Company\CompanyService;
use App\Models\Mark;
use App\Http\Requests\Admin\CompanyCreateRequest;
use DataForSelect;
use App\Models\Company;

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
        $sections = DataForSelect::getCompanySections();
        $companies = $this->service->getCompanies();
        return view('admin.company.index',compact('companies','sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $models = DataForSelect::getModels();
        $complects = DataForSelect::getComplects();
        $transmissions = DataForSelect::getTransmissions();
        $drivers = DataForSelect::getDrivers();
        $scenarios = DataForSelect::getCompanyScenarios();
        $sections = DataForSelect::getCompanySections();
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
        $company = $this->service->createCompany($request->all());
        if($company)
            return redirect()->route('companies.edit',$company)->with('status','Компания не добавлена');
        return redirect()->route('companies.create')->with('status','Ошибка. Компания не добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $models = DataForSelect::getModels();
        $complects = DataForSelect::getComplects();
        $transmissions = DataForSelect::getTransmissions();
        $drivers = DataForSelect::getDrivers();
        $scenarios = DataForSelect::getCompanyScenarios();
        $sections = DataForSelect::getCompanySections();
        $parameters = $this->service->calculate($company);
        return view('admin.company.create', compact('scenarios','models','complects','transmissions','drivers','sections','company','parameters'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $models = DataForSelect::getModels();
        $complects = DataForSelect::getComplects();
        $transmissions = DataForSelect::getTransmissions();
        $drivers = DataForSelect::getDrivers();
        $scenarios = DataForSelect::getCompanyScenarios();
        $sections = DataForSelect::getCompanySections();
        $parameters = $this->service->calculate($company);
        return view('admin.company.create', compact('scenarios','models','complects','transmissions','drivers','sections','company','parameters'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyCreateRequest $request, Company $company)
    {
        $company = $this->service->updatecompany($company,$request->all());
        if($company)
            return redirect()->route('companies.edit',$company)->with('status','Компания обновлена');
        return redirect()->route('companies.edit',$company)->with('status','Ошибка. Компания не обновлена');
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
