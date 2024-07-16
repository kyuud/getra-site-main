<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class  attendance extends Model
{
    protected $fillable = [
        "attendance_date",
        "technician_id",
        "exam_id",
        "employee",
        "company",
        "cnpj",
        "occupation",
        "modality_id",
        "accomplished",
        "doctor_id",
        "observation",
        "deleted_at"
    ];

    protected $table = "attendances";

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function healthtechnicians()
    {
        return $this->belongsTo(HealthTechnicians::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }

    public function hour()
    {
        return $this->belongsTo(HourAttendance::class, 'hour_id')->where('hour_attendances.deleted_at', null);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class, 'modality_id')->where('modalities.deleted_at', null);
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_id')->where('exams.deleted_at', null);
    }

    public function monthday(){
        return $this->belongsTo(MonthDay::class, 'month')->where('month_attendances.deleted_at', null);
    }

    public function technicianday()
    {
        return $this->belongsTo(TechnicianDay::class, 'day_id')->where('technicianDay.deleted_at', null);
    }
}
