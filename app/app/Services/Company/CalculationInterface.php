<?php
namespace App\Services\Company;

Interface CalculationInterface
{
	public function adminRender();

	public function clientRender();

	public function setData();

	public function fill($company);
}