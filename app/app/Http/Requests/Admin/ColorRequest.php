<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:1|max:200',
            'code'=>'required|min:1|max:50',
            'brand_id'=>'required|integer',
            'colors'=>'required|array',
            'colors.*'=>'required|min:2|max:10',
        ];
    }
}
