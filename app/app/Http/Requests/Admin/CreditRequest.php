<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreditRequest extends FormRequest
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
            'name'=>'required|string',
            'begin_date'=>'date',
            'end_date'=>'date',
            'banner'=>'nullable|image',
            'rate'=>'required',
            'pay'=>'required',
            'period'=>'required',
            'contribution'=>'required',
            'disclaimer'=>'required|min:50|max:3000',
        ];
    }
}
