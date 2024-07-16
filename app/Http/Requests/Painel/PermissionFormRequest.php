<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class PermissionFormRequest extends FormRequest
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
                'name'        => "required|min:3|max:30|unique:permissions,name,{$this->segment(3)},id",
                'label'       => "required|min:3|max:50|unique:permissions,label,{$this->segment(3)},id"
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
                'name.required'      => 'O campo nome é obrigatório!',
                'name.min'           => 'O campo nome tem que ter pelo menos 3 caracteres!',
                'name.max'           => 'O campo nome tem que ter no máximo 30 caracteres!',
                'name.unique'        => 'O campo nome já está sendo utilizado!',
                'label.required'     => 'O campo rótulo é obrigatório!',
                'label.min'          => 'O campo rótulo tem que ter pelo menos 3 caracteres!',
                'label.max'          => 'O campo rótulo tem que ter no máximo 50 caracteres!',
                'label.unique'       => 'O campo rótulo já está sendo utilizado!',

            ];
        }
    }
