<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackCreateRequest extends FormRequest
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
            'name'=>'string|nullable',
            'code'=>'required|string',
            'price'=>'integer|nullable',
            'brand_id'=>'integer|nullable',

            'mark_ids'=>'required|array',
            'mark_ids.*'=>'required|integer',

            'option_ids'=>'required|array',
            'option_ids.*'=>'required|integer'
        ];
    }
}
