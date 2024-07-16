<?php

        namespace App\Http\Requests\Painel;

        use Illuminate\Foundation\Http\FormRequest;

        class LogFormRequest extends FormRequest
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
        public function rules($id = null)
        {
            # GENERAL
            $rules = [
                'user_id'  => 'required',
                'ip'       => 'required',
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
                'user_ip.required' => 'O campo usuário é obrigatório!',
                'ip.required'      => 'O campo ip é obrigatório!',
            ];
        }
    }
