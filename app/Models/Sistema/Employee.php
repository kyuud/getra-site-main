<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        "company_id",
        "name",
        "occupation",
        "age",
        "rg",
        "cpf",
        "nis",
        "matricula",
        "sex",
        "birth",
        "deleted_at"
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id')->where('system_companies.deleted_at', null);
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'system_companies')->where('system_companies.deleted_at', null);
    }

    public function aso()
    {
        return $this->hasmany(Aso::class, 'aso')->where('aso.deleted_at', null);
    }

    public function anamnese()
    {
        return $this->hasmany(anamnese::class, 'anamnese')->where('anamnese.deleted_at', null);
    }

    public function screening()
    {
        return $this->hasmany(screening::class, 'screening')->where('screening.deleted_at', null);
    }

    public function periodical()
    {
        return $this->hasmany(periodical::class, 'periodical')->where('periodical.deleted_at', null);
    }
}
