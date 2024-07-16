<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class UserFormRequest extends FormRequest
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
                'name'        => 'required|min:3|max:100',
                'email'       => "required|email:rfc,dns|unique:users,email,{$this->segment(3)},id",
                'password'    => 'required|min:8|confirmed',
                'image'       => 'mimes:jpg,jpeg,png|file|max:2000|dimensions:width=500,height=500'
            ];

            # CREATE
            if ($this->getMethod() == "POST") {
                $rules['image'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=500,height=500';
            }

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
                'name.max'           => 'O campo nome tem que ter no máximo 100 caracteres!',
                'email.required'     => 'O campo email é obrigatório!',
                'email.email'        => 'O campo email deve ser preenchido com um e-mail válido!',
                'email.unique'       => 'O campo email já está cadastrado!',
                'password.required'  => 'O campo senha é obrigatório!',
                'password.min'       => 'O campo senha deve ter no mínimo 8 caracteres!',
                'password.confirmed' => 'Os campos senhas não confere!',
                'image.required'     => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
                'image.mimes'        => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
                'image.max'          => 'O campo imagem deve ter no máximo 2 Mb!',
                'image.dimensions'   => 'O campo imagem deve conter uma imagem de 500px x 500px!'
            ];
        }
    }
