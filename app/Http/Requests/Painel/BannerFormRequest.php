<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class BannerFormRequest extends FormRequest
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
                'title'       => 'required|min:3|max:100',
                'position'    => 'required|numeric',
                'url'         => 'required',
                'description' => 'min:3|max:1000',
                'image'       => 'mimes:jpg,jpeg,png|file|max:2000|dimensions:width=1280,height=471'
            ];

            # CREATE
            if ($this->getMethod() == "POST") {
                $rules['image'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=1280,height=471';
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
                'title.required'    => 'O campo título é obrigatório!',
                'title.min'         => 'O campo título tem que ter pelo menos 3 caracteres!',
                'title.max'         => 'O campo título tem que ter no máximo 100 caracteres!',
                'position.required' => 'O campo posição é obrigatório!',
                'position.number'   => 'O campo posição tem que ser um número!',
                'url.required'      => 'O campo url é obrigatório!',
                'description.min'   => 'O campo descrição tem que ter pelo menos 3 caracteres!',
                'description.max'   => 'O campo descrição tem que ter no máximo 100 caracteres!',
                'image.required'    => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
                'image.mimes'       => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
                'image.max'         => 'O campo imagem deve ter no máximo 2 Mb!',
                'image.dimensions'  => 'O campo imagem deve conter uma imagem de 1280px x 471px!'
            ];
        }
    }
