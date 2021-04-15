<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ComplectCreateRequest extends FormRequest
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
            'name'=>'nullable|string',
            'code'=>'required|string',
            'price'=>'required|integer',
            'brand_id'=>'required|integer',
            'mark_id'=>'required|integer',
            'motor_id'=>'required|integer',
            'option_ids'=>'required|array',
            'option_ids.*'=>'integer|required',

            'pack_ids'=>'array|nullable',
            'pack_ids.*'=>'integer'
        ];
    }
}
