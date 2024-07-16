<?php

    namespace App\Http\Requests\Sistema;

    use Illuminate\Foundation\Http\FormRequest;

    class AppraisalFormRequest extends FormRequest
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
                "cnpj"          => "required",
                "start"         => "required",
                "titulo"         => "required",
                "validity"      => "required",
                "deadline"      => "required",

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
                "cnpj.required"              => "Este campo é obrigatório!",
                "start.required"             => "Este campo é obrigatório!",
                "titulo.required"             => "Este campo é obrigatório!",
                "validity.required"          => "Este campo é obrigatório!",
                "deadline.required"          => "Este campo é obrigatório!",
    
            ];
        }
    }
