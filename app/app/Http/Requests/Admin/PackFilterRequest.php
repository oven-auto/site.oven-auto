<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PackFilterRequest extends FormRequest
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
            'code'=>'string|nullable',
            'price'=>'integer|nullable',
            'option_id'=>'string|nullable',
            'mark_id'=>'integer|nullable'
        ];
    }
}
