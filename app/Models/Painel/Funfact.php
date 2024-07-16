<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Funfact extends Model
{
    protected $fillable = [
        "title",
        "value",
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
            'value'       => 'required|min:1',
        ];

        # CREATE
        if ($metod == "POST") {
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
            'value.min'         => 'O campo valor tem que ter pelo menos 3 caracteres!',
        ];
    }
}
