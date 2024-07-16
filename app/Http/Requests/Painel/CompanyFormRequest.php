<?php

    namespace App\Http\Requests\Painel;

    use Illuminate\Foundation\Http\FormRequest;

    class CompanyFormRequest extends FormRequest
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
    public function rules()
    {

        $rules = [
            "street"        => "required|min:3|max:100",
            "number"        => "required",
            "neighborhood"  => "required|min:3|max:100",
            "cep"           => "required",
            "city"          => "required|min:3|max:100",
            "state"         => "required|min:3|max:100",
            "phone"         => "required|min:13|max:15",           
            "email"         => "required|max:100|email",            
            "facebook"      => "max:100",
            "twitter"       => "max:100",
            "instagram"     => "max:100",
            "youtube"       => "max:100",            
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
        return 
        [
            "street.required"          => "O campo rua é obrigatório!",
            "street.min"               => "O campo rua tem que ter pelo menos 3 caracteres!",
            "street.max"               => "O campo rua tem que ter no máximo 100 caracteres!",                                      
            "number.required"          => "O campo número é obrigatório!",            
            "neighborhood.required"    => "O campo bairro é obrigatório!",
            "neighborhood.min"         => "O campo bairro tem que ter pelo menos 3 caracteres!",
            "neighborhood.max"         => "O campo bairro tem que ter no máximo 100 caracteres!",                                      
            "cep.required"             => "O campo cep é obrigatório!",            
            "city.required"            => "O campo cidade é obrigatório!",
            "city.min"                 => "O campo cidade tem que ter pelo menos 3 caracteres!",
            "city.max"                 => "O campo cidade tem que ter no máximo 100 caracteres!",                                      
            "state.required"           => "O campo estado é obrigatório!",
            "state.min"                => "O campo estado tem que ter pelo menos 3 caracteres!",
            "state.max"                => "O campo estado tem que ter no máximo 100 caracteres!",               
            "phone.required"           => "O campo telefone é obrigatório!",
            "phone.min"                => "O campo telefone tem que ter pelo menos 13 caracteres!",
            "phone.max"                => "O campo telefone tem que ter no máximo 15 caracteres!",                                                                                    
            "email.required"           => "O campo e-mail é obrigatório!",           
            "email.email"              => "O campo e-mail deve ter formato de email!",           
            "enail.max"                => "O campo e-mail tem que ter no máximo 100 caracteres!",                                                              
            "facebook.max"             => "O campo facebook tem que ter no máximo 100 caracteres!",                                                 
            "instagram.max"            => "O campo instagram tem que ter no máximo 100 caracteres!",                                                  
            "twitter.max"              => "O campo twitter tem que ter no máximo 100 caracteres!",                                      
            "youtube.max"              => "O campo youtube tem que ter no máximo 100 caracteres!",                                      
        ];
    }
}
