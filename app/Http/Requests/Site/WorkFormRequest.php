<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\URL;

class WorkFormRequest extends FormRequest
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
            'name'               => 'required|min:3|max:100',
            'email'              => "required|email",
            'phone'              => "required",
            'file'               => 'required|mimes:pdf,doc,docx|max:50000',
            recaptchaFieldName() => recaptchaRuleName()
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
            'name.max'           => 'O campo nome tem que ter no máximo 100 caracteres!',
            'email.required'     => 'O campo email é obrigatório!',
            'email.email'        => 'O campo email deve ser preenchido com um e-mail válido!',
            'phone.required'     => 'O campo telefone é obrigatório!',
            'file.required'      => 'O campo deve ser preenchido com um arquivo: pdf, doc ou docx!',
            'file.mimes'         => 'O campo deve ser preenchido com um arquivo: pdf, doc ou docx!',
            'file.max'           => 'O campo deve ter no máximo 2 Mb!'
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

        return URL::previous().'#contato';
    }

}
