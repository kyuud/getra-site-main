<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class FunfactFormRequest extends FormRequest
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
            'value'       => 'required|min:1',
        ];

        # CREATE
        if ($this->getMethod() == "POST") {
            $rules;
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
            'value.min'         => 'O campo valor tem que ter pelo menos 1 caracteres!',
        ];
    }
}
