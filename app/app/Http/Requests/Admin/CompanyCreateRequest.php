<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyCreateRequest extends FormRequest
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
            'begin_date'=>'required|date',
            'end_date'=>'required|date',
            'status'=>'required',
            'section_id'=>'required|integer',
            'name'=>'required|max:300|min:5',
            'scenario_id'=>'required',
            'title'=>'required|min:10|max:300',
            'offer'=>'required|min:10|max:500',
            'text'=>'required|min:10|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'begin_date.required' => 'Поле начало акции обязательно для заполнения',
            'begin_date.date'  => 'Поле начало акции должно быть датой ДД-ММ-ГГГГ',
            'end_date.required' => 'Поле конец акции обязательно для заполнения',
            'end_date.date'  => 'Поле конец акции должно быть датой ДД-ММ-ГГГГ',
            'status.request'=>'Поле статус обязательно для заполнения',
            'section_id.required'=>'Поле раздел обязательно для заполнения',
            'section_id.integer'=>'Поле раздел должно быть целым числом',
            'name.required'=>'Поле имя компании обязательно для заполнения',
            'name.min'=>'Поле имя компании минимум 5 символов',
            'name.max'=>'Поле имя компании максимум 300 символов',
            'scenario_id.required'=>'Поле сценарий обязательно для заполнения',
            'title.required'=>'Поле заголовок обязательно для заполнения',
            'title.min'=>'Поле заголовок минимум 10 символов',
            'title.max'=>'Поле заголовок максимум 300 символов',
            'offer.required'=>'Поле офер обязательно для заполнения',
            'offer.min'=>'Поле офер минимум 10 символов',
            'offer.max'=>'Поле офер максимум 500 символов',
            'text.required'=>'Поле описание обязательно для заполнения',
            'text.min'=>'Поле описание минимум 10 символов',
            'text.max'=>'Поле описание максимум 3000 символов',
        ];
    }
}
