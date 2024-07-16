<?php

    namespace App\Http\Requests\Sistema;

    use Illuminate\Foundation\Http\FormRequest;

    class EmployeeFormRequest extends FormRequest
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
            "company_id"    => "required",
            "name"          => "required|min:3|max:100",
            "occupation"    => "required|min:3",
            "age"           => "required",
            "rg"            => "required",
            "cpf"           => "required",
            // "nis"           => "required",
            // "matricula"     => "required",
            "sex"           => "required",
            "birth"         => "required|min:10"
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
            "company_id.required"           => "O campo Nome da empresa é obrigatório!",
            "name.required"                 => "O campo Nome é obrigatório!",
            "name.min"                      => "O campo Nome tem que ter pelo menos 3 caracteres!",
            "name.max"                      => "O campo Nome tem que ter no máximo 100 caracteres!",
            "occupation.required"           => "O campo Cargo é obrigatório!",
            "age.required"                  => "O campo idade é obrigatório!",
            "rg.required"                   => "O campo RG é obrigatório!",
            "cpf.required"                  => "O campo CPF é obrigatório!",
            // "nis.required"                  => "O campo PIS/NIS é obrigatório!",
            // "matricula.required"            => "O campo Matricula é obrigatório!",
            "sex.required"                  => "O campo Sexo é obrigatório!",
            "birth.required"                => "O campo Data de nascimento é obrigatório!",
        ];
    }
}
