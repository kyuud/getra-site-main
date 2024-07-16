<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Periodical extends Model
{
    protected $fillable = [
        "employee_id",

        "pdf",
        "deleted_at"
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
