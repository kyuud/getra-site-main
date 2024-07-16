<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\URL;

class ProposalRequest extends FormRequest
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
     * Regras dos Possíveis Erros
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nome'                  => 'required',
            'email'                 => "required|email",
            'telefone'              => 'required',
            'funcionarios'          => 'required',
            'cnpj'                  => 'required|min:14',
            'mensagem'              => 'required|min:10|max:1000',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'         => 'O campo nome é obrigatório!',
            'name.min'              => 'O campo nome tem que ter pelo menos 3 caracteres!',
            'name.max'              => 'O campo nome tem que ter no máximo 100 caracteres!',
            'email.required'        => 'O campo email é obrigatório!',
            'email.email'           => 'O campo email deve ser preenchido com um e-mail válido!',
            'telefone.required'     => 'O campo telefone é obrigatório!',
            'funcionarios.required' => 'O campo funcionários é obrigatório',
            'cnpj.required'         => 'O campo CNPJ é obrigatório',

        ];
    }

    protected function getRedirectUrl()
    {

        $url = $this->redirector->getUrlGenerator();

        if ($this->redirect) {
            return $url->to($this->redirect);
        } elseif ($this->redirectRoute) {
            return $url->route($this->redirectRoute);
        } elseif ($this->redirectAction) {
            return $url->action($this->redirectAction);
        }

        return URL::previous().'#proposal';
    }
}
