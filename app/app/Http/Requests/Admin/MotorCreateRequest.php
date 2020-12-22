<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MotorCreateRequest extends FormRequest
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
            'name'=>'required|string|min:2|max:20',
            'type_id'=>'required|integer',
            'transmission_id'=>'required|integer',
            'driver_id'=>'required|integer',
            'brand_id'=>'required|integer',
            'size'=>'required|integer',
            'power'=>'required|integer',
            'valve'=>'required|integer',
        ];
    }
}
