<?php
namespace App\Services\Credit;
use App\Models\Credit\Credit;
use DB;
Class CreditService{
	
	private $creditCol = ['name','rate','begin_date','end_date','pay','contribution','disclaimer','period','banner'];
	private $creditMarkCol = ['mark_id'];

	private function extractValue($data, $keys)
	{
		$mas = array();
		foreach ($keys as $key => $value) 
			if(array_key_exists($value, $data))
				$mas[$value] = $data[$value];
		return $mas;
	}

	public function getCredits()
	{
		$credits = Credit::with('models.model.lowcomplect')->get();
		return $credits;
	}

	public function getAltualCredits()
	{
		$credits = Credit::with('models.model.lowcomplect')->where('end_date','<',date('Y-m-d'))->get();
		return $credits;
	}

	public function createCredit($data)
	{
		try
		{
		    $credit = DB::transaction(function() use ($data)
		    {
				$credit = Credit::create($this->extractValue($data,$this->creditCol));
				foreach($data['mark_ids'] as $item)
					$credit->models()->create(['mark_id'=>$item]);
				return $credit;
			});
		}
		catch(Exception $e)
		{
		    return false;
		}
		return $credit;
	}

	public function updateCredit($credit,$data)
	{
		try
		{
		    $credit = DB::transaction(function() use ($data,$credit)
		    {
				$credit->update($this->extractValue($data,$this->creditCol));
				if(isset($data['mark_ids']))
				{
					$credit->models()->delete();
					foreach($data['mark_ids'] as $item)
						$credit->models()->create(['mark_id'=>$item]);
				}
				return $credit;
			});
		}
		catch(Exception $e)
		{
		    return false;
		}
		return $credit;
	}

	public function getArrayMarks()
	{
		$result = \App\Models\Mark::select('name','id')->get()->pluck('name','id');
		return $result;
	}

}

