<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    protected $fillable = [
        "name",
        "cnpj_cpf",
        "commission",
        "deleted_at"
    ];

    public function accountant() {
      return $this->belongsTo(Company::class);
    }

}
