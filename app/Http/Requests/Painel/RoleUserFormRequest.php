<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class RoleUserFormRequest extends FormRequest
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
         * REGRAS DOS POSSÍVEIS ERROS
         *
         * @return array
         */
        public function rules()
        {
            # GENERAL
            $rules = [
                'role_id'        => "required",
                'user_id'        => "required"
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
                'role_id.required'        => 'O campo papel é obrigatório!',
                'user_id.required'        => 'O campo usuário é obrigatório!'

            ];
        }
    }
