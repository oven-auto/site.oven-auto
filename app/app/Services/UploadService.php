<?php
namespace App\Services;
use Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

Class UploadService
{
	public function store($array = [],Model $model)
	{
		$result = [];
		foreach ($array as $key => $itemFile)
		{
			if($itemFile instanceof UploadedFile)
			{

                if(Storage::exists($model->$key))
                {
                    Storage::delete($model->$key);
                }

				$result[$key] = $itemFile->store($model->getTable().'/'.$model->id);
			}
		}
		return $result;
	}
}
