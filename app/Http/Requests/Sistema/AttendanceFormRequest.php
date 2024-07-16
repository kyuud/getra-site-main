<?php

namespace App\Http\Requests\Sistema;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "attendance_date"   => "required",
            "technician_id"     => "required",
            "employee"          => "required",
            "company"           => "required",
            "doctor_id"         => "required",
            "cnpj"              => "required",
            "exam_id"           => "required",
            "modality_id"       => "required",
            "occupation"        => "required"
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
                "attendance_date.required"   => "O campo Hora de Atendimento é Obrigatório",
                "technician_id.required"     => "O campo Técnico responsável é Obrigatório",
                "company.required"           => "O campo Nome da empresa é obrigatório!",
                "employee.required"          => "O campo Nome do Funcionário é obrigatório!",
                "doctor_id.required"         => "O campo Nome do Médico é obrigatório!",
                "cnpj.required"              => "O capo CNPJ é Obrigatório",
                "occupation.required"        => "O campo Cargo é obrigatório!",
                "age.required"               => "O campo idade é obrigatório!",
                "rg.required"                => "O campo rg é obrigatório!",
                "cpf.required"               => "O campo cpf é obrigatório!",
                "sex.required"               => "O campo sexo é obrigatório!",
                "birth.required"             => "O campo data de nascimento é obrigatório!",
                "exam_id.required"           => "Este campo é obrigatório!",
                "modality_id.required"       => "Este campo é obrigatório!",

            ];
    }
}
