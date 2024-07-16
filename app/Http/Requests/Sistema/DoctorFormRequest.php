<?php

    namespace App\Http\Requests\Sistema;

    use Illuminate\Foundation\Http\FormRequest;

    class DoctorFormRequest extends FormRequest
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
            "name"        => "required|min:3|max:100",
            "cpf"         => "required",
            "crm"         => "required",
            "uf"          => "required",
            "pis"         => "required",
            "specialty"   => "required|min:3|max:100",
            "phone"       => "required",
            "email"       => "required|min:3|max:100"
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
            "name.required"                  => "O campo Nome é obrigatório!",
            "name.min"                       => "O campo Nome tem que ter pelo menos 3 caracteres!",
            "name.max"                       => "O campo Nome tem que ter no máximo 100 caracteres!",
            "cpf.required"                   => "O campo CPF é obrigatório!",
            "crm.required"                   => "O campo CRM é obrigatório!",
            "uf.required"                    => "O campo UF deve conter exatamente 2 caracteres!",
            "pis.required"                   => "O campo PIS/NIS é obrigatório!",
            "specialty.min"                  => "O campo Especialidade tem que ter pelo menos 3 caracteres!",
            "specialty.max"                  => "O campo Especialidade tem que ter no máximo 100 caracteres!",
            "specialty.required"             => "O campo Especialidade é obrigatório!",
            "phone.required"                 => "O campo Telefone é obrigatório!",
            "email.required"                 => "O campo email é obrigatório!",
        ];
    }
}
