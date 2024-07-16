<?php

    namespace App\Http\Requests\Sistema;

    use Illuminate\Foundation\Http\FormRequest;

    class AsoFormRequest extends FormRequest
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
            "employee_id"   => "required",
            "doctor_id"     => "required",
            "doctor_id2"    => "required",
            "occupation"    => "required",
            "age"           => "required",
            "rg"            => "required",
            "cpf"           => "required",
            "sex"           => "required",
            "birth"         => "required",
            "dataexam16"    => "required",

            "exam"          => "required",
            "attest"        => "required"
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
            "company_id.required"        => "O campo Nome da empresa é obrigatório!",
            "employee_id.required"       => "O campo Nome é obrigatório!",
            "doctor_id.required"         => "O campo Nome do Médico é obrigatório!",
            "doctor_id2.required"        => "O campo Nome do Médico Responsável é obrigatório!",
            "occupation.required"        => "O campo Cargo é obrigatório!",
            "age.required"               => "O campo idade é obrigatório!",
            "rg.required"                => "O campo rg é obrigatório!",
            "cpf.required"               => "O campo cpf é obrigatório!",
            "sex.required"               => "O campo sexo é obrigatório!",
            "birth.required"             => "O campo data de nascimento é obrigatório!",


            "dataexam16.required"        => "Este campo é obrigatório!",
            "exam.required"              => "Este campo é obrigatório!",
            "attest.required"            => "Este campo é obrigatório!",

        ];
    }
}