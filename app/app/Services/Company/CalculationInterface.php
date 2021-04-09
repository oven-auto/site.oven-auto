<?php
namespace App\Services\Company;
use App\Models\Car;

Interface CalculationInterface
{
	public function adminRender();

	public function clientRender();

	public function setData(Car $car);

	public function fill($company);

	public function price($car);
}