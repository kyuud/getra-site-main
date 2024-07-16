<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        "name",
        "cpf",
        "crm",
        "uf",
        "pis",
        "specialty",
        "phone",
        "email",
        "deleted_at"
    ];

    protected $table = "doctors";
}
