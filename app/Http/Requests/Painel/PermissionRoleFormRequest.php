<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class PermissionRoleFormRequest extends FormRequest
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
                'permission_id'  => "required",
                //'role_id'        => "required"
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
                'permission_id.required'  => 'É obrigatório escolher pelo menos uma permissão!',
                //'role_id.required'        => 'O campo papel é obrigatório!',

            ];
        }
    }
