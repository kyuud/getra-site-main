<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class HealthTechnicians extends Model
{
    protected $fillable = [
        "name",
        "status",
        "deleted_at"
    ];

    protected $table = "health_technicians";

}
