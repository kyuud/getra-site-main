<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        "name",
        "cnpj",
        "fantasyname",
        "street",
        "number",
        "neighborhood",
        "complement",
        "city",
        "state",
        "email",
        "phone",
        "lives",
        "value_lives",
        "pdf",
        "observation",
        "inativation",
        "deleted_at",
        "status"
    ];

    protected $table = "system_companies";

    public function employee()
    {
        return $this->hasManyThrough(Employee::class);
    }

    public function ListAttendance()
    {
        return $this->belongsTo(ListAttendance::class);
    }
}
