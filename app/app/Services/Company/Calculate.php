<?php
namespace App\Services\Company;
use App\Services\Company\CalculationInterface;

Class Calculate extends AbstractCompanyClass  implements CalculationInterface
{
	public $base = null;
	public $packs = null;
	public $options = null;
	public $procent = null;
	public $limit = null;

	public $company = null;

	public function adminRender()
	{
		return view('admin.company.calculate')->with('self',$this);
	}

	public function clientRender()
	{
		return view('front.company.calculate')->with('self',$this);
	}

	public function setData()
	{

	}

	public function fill($company)
	{

		$this->company = $company;

		$data = json_decode($company->calculation->parameters);

		if(isset($data->base))
			$this->base = $data->base;

		if(isset($data->packs))
			$this->packs = $data->packs;

		if(isset($data->options))
			$this->options = $data->options;

		if(isset($data->procent))
			$this->procent = $data->procent;

		if(isset($data->limit))
			$this->limit = $data->limit;
	}
}