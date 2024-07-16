<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        "image",
        "title",
        // "url",
        // "position",
        // "description",
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
            // 'position'    => 'required|numeric',
            // 'url'         => 'required',
            // 'description' => 'min:3|max:1000',
            'image'       => 'mimes:jpg,jpeg,png|file|max:2000|dimensions:width=1920,height=400'
        ];

        # CREATE
        if ($metod == "POST") {
            $rules['image'] = 'required:image|mimes:jpg,jpeg,png|file|max:2000|dimensions:width=1920,height=400';
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
            // 'position.required' => 'O campo posição é obrigatório!',
            // 'position.number'   => 'O campo posição tem que ser um número!',
            // 'url.required'      => 'O campo url é obrigatório!',
            // 'description.min'   => 'O campo descrição tem que ter pelo menos 3 caracteres!',
            // 'description.max'   => 'O campo descrição tem que ter no máximo 100 caracteres!',
            'image.required'    => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image.mimes'       => 'O campo imagem deve ser preenchido com um arquivo: png, jpg ou jpeg!',
            'image.max'         => 'O campo imagem deve ter no máximo 2 Mb!',
            'image.dimensions'  => 'O campo imagem deve conter uma imagem de 1920px x 400px!'
        ];
    }
}