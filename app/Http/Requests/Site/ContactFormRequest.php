<?php

    namespace App\Http\Requests\Site;

    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Support\Facades\URL;

    class ContactFormRequest extends FormRequest
    {

        public function authorize()
        {
            return true;
        }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
        {
            # GENERAL
            $rules = [                
                'nome'                  => "required",
                'email'                 => "required|email",
                'telefone'              => 'required',
                'mensagem'              => 'required|min:10|max:1000',
                recaptchaFieldName()    => recaptchaRuleName()
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
                'nome.required'               => 'O campo nome é obrigatório!',
                'email.required'              => 'O campo email é obrigatório!',
                'email.email'                 => 'O campo email deve ser preenchido com um e-mail válido!',                
                'telefone.required'           => 'O campo telefone é obrigatório!',                                
                'mensagem.required'           => 'O campo mensagem é obrigatório!',                
                'mensagem.max'                => 'O campo mensagem deve ter no máximo 1000 caracteres!',
                'mensagem.min'                => 'O campo mensagem deve ter no mínimo 10 caracteres!'
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
