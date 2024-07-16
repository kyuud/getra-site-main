<?php

    namespace App\Http\Requests\Sistema;

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
            "name"         => "required|min:3|max:100",
            "cnpj"         => "required|min:11|max:14",
            "fantasyname"  => "required|min:3|max:100",
            "street"       => "required",
            "number"       => "required",
            "neighborhood" => "required",
            "city"         => "required",
            "state"        => "required",
            "phone"        => "required"
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
            "name.required"                 => "O campo Nome é obrigatório!",
            "name.min"                      => "O campo Nome tem que ter pelo menos 3 caracteres!",
            "name.max"                      => "O campo Nome tem que ter no máximo 100 caracteres!",
            "cnpj.required"                 => "O campo CNPJ é obrigatório!",
            "cnpj.min"                      => "O campo CNPJ tem que ter pelo menos 11 caracteres!",
            "cnpj.max"                      => "O campo CNPJ tem que ter no máximo 14 caracteres!",
            "fantasyname.required"          => "O campo Nome Fantasia é obrigatório!",
            "fantasyname.min"               => "O campo Nome Fantasia tem que ter pelo menos 3 caracteres!",
            "fantasyname.max"               => "O campo Nome Fantasia tem que ter no máximo 100 caracteres!",
            "street.required"               => "Este campo é obrigatório!",
            "number.required"               => "Este campo é obrigatório!",
            "neighborhood.required"         => "Este campo é obrigatório!",
            "city.required"                 => "Este campo é obrigatório!",
            "state.required"                => "Este campo é obrigatório!",
            "phone.required"                => "Este campo é obrigatório!"
        ];
    }
}
