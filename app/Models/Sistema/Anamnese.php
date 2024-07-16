<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{
    protected $fillable = [
        "employee_id",
        "pdf",
        "digpdf",
        "deleted_at"
    ];

    public function employee()
        {
            return $this->belongsTo(Employee::class);
        }
}
