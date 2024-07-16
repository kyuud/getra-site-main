<?php

namespace App\Http\Requests\Sistema;

use Illuminate\Foundation\Http\FormRequest;

class PatrimonyFormRequest extends FormRequest
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
            'invoice'     => 'required|min:3|max:10',
            'title'       => 'required|min:3|max:200',
            'product_id'  => 'required',
            'amount'      => 'required',
            'value'       => 'required',
            'observation' => 'required|min:3|max:10000',
            'image_url'   => 'required|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=1080,height=720'
            //'image'         => 'mimes:jpg,jpeg,png|file|max:2000'
        ];

        # CREATE
        if ($this->getMethod() == "POST") {
            $rules['image_url'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=1080,height=720';
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
            'invoice.required' => 'O campo NF é obrigatório!',
            'title.min' => 'O campo nome tem que ter pelo menos 3 caracteres!',
            'title.max' => 'O campo nome tem que ter no máximo 200 caracteres!',
            'description.required' => 'O campo descrição é obrigatório',
            'observation.min' => 'O campo descrição tem que ter pelo menos 3 caracteres!',
            'observation.max' => 'O campo descrição tem que ter no máximo 10000 caracteres!',
            'image_url.required' => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image_url.mimes' => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image_url.max' => 'O campo imagem deve ter no máximo 2 Mb!',
            'image_url.dimensions' => 'O campo imagem deve conter uma imagem de 1080 x 720!'
            // 'image.required'                => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            // 'image.mimes'                   => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            // 'image.max'                     => 'O campo imagem deve ter no máximo 2 Mb!',
        ];

    }

}
