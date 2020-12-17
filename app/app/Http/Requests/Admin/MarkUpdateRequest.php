<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MarkUpdateRequest extends FormRequest
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
            'name'=>'required|min:2|max:100',
            'brand_id'=>'required|integer',
            'prefix'=>'max:100',
            'banner'=>'image',
            'icon'=>'image',
            'alpha'=>'image',
            'slogan'=>'required|min:30|max:600',
            'description'=>'required|min:100|max:5000',
            'body_id'=>'required|integer',
            'country_id'=>'required|integer',
            'status'=>'required|boolean',

            'brochure'=>'mimes:pdf',
            'manual'=>'mimes:pdf',
            'price'=>'mimes:pdf',
            'toy'=>'mimes:pdf'
        ];
    }
}
