<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class TechnicianAttendance extends Model
{

    protected $fillable = [
        "technician_id",
        "attendance_id",
        "deleted_at"
    ];

    protected $table = 'technician_attendance';

}
