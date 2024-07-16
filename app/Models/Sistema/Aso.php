<?php

    namespace App\Models\Sistema;

    use Illuminate\Database\Eloquent\Model;

    class Aso extends Model
    {
        protected $fillable = [
            "employee_id",
            "doctor_id",
            "pdf",
            "digpdf",
            "xml",
            "deleted_at"
        ];

        public function employee()
        {
            return $this->belongsTo(Employee::class);
        }

        public function doctor()
        {
            return $this->belongsTo(Doctor::class);
        }
    }


