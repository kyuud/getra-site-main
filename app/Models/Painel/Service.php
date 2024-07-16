<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        "image",
        "title",
        "description",
        "status",
        "deleted_at"
    ];

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
            'description' => 'min:3|max:1000',
            'image'       => 'mimes:jpg,jpeg,png|file|max:2000|dimensions:width=88,height=58'
        ];

        # CREATE
        if ($metod == "POST") {
            $rules['image'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=88,height=58';
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
            'description.min'   => 'O campo descrição tem que ter pelo menos 3 caracteres!',
            'description.max'   => 'O campo descrição tem que ter no máximo 100 caracteres!',
            'image.required'    => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image.mimes'       => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image.max'         => 'O campo imagem deve ter no máximo 2 Mb!',
            'image.dimensions'  => 'O campo imagem deve conter uma imagem de 88px x 58px!'
        ];
    }
}
