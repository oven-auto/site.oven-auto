<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CarCreateRequest extends FormRequest
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
            'brand_id'=>'integer|required',
            'mark_id'=>'integer|required',
            'complect_id'=>'integer|required',
            'color_id'=>'integer|required',
            'author_id'=>'integer|required',
            'delivery_id'=>'integer|required',
            'marker_id'=>'integer|nullable',
            'year'=>'integer|required|min:1950|max:2050',
            'vin'=>'alpha_num|required|size:17',

            'pack_ids'=>'nullable|array',
            'pack_ids.*'=>'integer',

            'option_ids'=>'array|nullable',
            'option_ids.*'=>'integer',

            'order_date'=>'date|nullable',
            'plan_date'=>'date|nullable',
            'notice_date'=>'date|nullable',
            'build_date'=>'date|nullable',
            'ready_date'=>'date|nullable',
            'ship_date'=>'date|nullable',
        ];
    }
}
