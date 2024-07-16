<?php

namespace App\Http\Requests\Painel;

use Illuminate\Foundation\Http\FormRequest;

class UnitFormRequest extends FormRequest
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
    public function rules($id = null)
    {
        # GENERAL
        $rules = [
            'title' => 'required|min:3|max:200',
            'description' => 'required|min:3|max:10000',
            'image' => 'mimes:jpg,jpeg,png|file|max:2000|dimensions:width=300,height=350'
            // 'image'         => 'mimes:jpg,jpeg,png|file|max:2000'
        ];

        # CREATE
        if ($this->getMethod() == "POST") {
            $rules['image'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=300,height=350';
            // $rules['image'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000';
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
            'title.required' => 'O campo título é obrigatório!',
            'title.min' => 'O campo título tem que ter pelo menos 3 caracteres!',
            'title.max' => 'O campo título tem que ter no máximo 200 caracteres!',
            'description.required' => 'O campo descrição é obrigatório',
            'description.min' => 'O campo descrição tem que ter pelo menos 3 caracteres!',
            'description.max' => 'O campo descrição tem que ter no máximo 10000 caracteres!',
            'image.required' => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image.mimes' => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image.max' => 'O campo imagem deve ter no máximo 2 Mb!',
            'image.dimensions' => 'O campo imagem deve conter uma imagem de 300px x 350px!'
            // 'image.required'                => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            // 'image.mimes'                   => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            // 'image.max'                     => 'O campo imagem deve ter no máximo 2 Mb!',
        ];

    }
}
