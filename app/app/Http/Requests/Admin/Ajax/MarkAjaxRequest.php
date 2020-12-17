<?php

namespace App\Http\Requests\Admin\Ajax;

use Illuminate\Foundation\Http\FormRequest;

class MarkAjaxRequest extends FormRequest
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
            'sort'=>'integer',
            'status'=>'boolean'
        ];
    }
}
