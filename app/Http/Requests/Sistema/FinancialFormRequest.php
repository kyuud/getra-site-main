<?php

    namespace App\Http\Requests\Sistema;

    use Illuminate\Foundation\Http\FormRequest;

    class FinancialFormRequest extends FormRequest
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
                "company_id"    => "required",
                "city"          => "required",
                "email"         => "required",
                "duedate"       => "required",
                "qtd"           => "required",
                "discounts"     => "required",
                "obs"           => "required"
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
            return
            [
                "company_id.required"        => "O campo Nome da empresa é obrigatório!",
                "city.required"              => "Este campo é obrigatório!",
                "email.required"             => "Este campo é obrigatório!",
                "duedate.required"           => "Este campo é obrigatório!",
                "qtd.required"               => "Este campo é obrigatório!",
                "discounts.required"         => "Este campo é obrigatório!",
                "obs.required"               => "Este campo é obrigatório!"    
            ];
        }
    }
