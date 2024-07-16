<?php

namespace App\Http\Requests\Sistema;

use Illuminate\Foundation\Http\FormRequest;

class AdditionalExamsFormRequest extends FormRequest
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
        $rules = [
            'name'          => 'required',
            'cnpj'          => 'required',
            'exam_name'     => 'required',
            'exam_value'    => 'required',
            'exam_date'     => 'required',
            'supplier_id'   => 'required',
            'company_id'    => 'required',
        ];

        return $rules;
    }

    /**
     * MENSAGENS DE ERROS PARA OS SEUS RESPECTIVOS CAMPOS.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'         => 'O campo Nome da empresa é obrigatório!',
            'cnpj.required'         => 'Este campo é obrigatório!',
            'exam_name.required'    => 'Este campo é obrigatório!',
            'exam_value.required'   => 'Este campo é obrigatório!',
            'exam_date.required'    => 'Este campo é obrigatório!',
            'supplier_id.required'  => 'Este campo é obrigatório!',
            'company_id.required'   => 'Este campo é obrigatório!',
        ];
    }
}
