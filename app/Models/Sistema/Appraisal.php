<?php

    namespace App\Models\Sistema;

    use Illuminate\Database\Eloquent\Model;

    class Appraisal extends Model
    {
        protected $fillable = [
            "deleted_at",
            "start",
            "titulo",
            "validity",
            "deadline",
            "status",
            "company_id"
        ];

        public function company()
        {
            return $this->belongsTo(Company::class);
        }
        
    }
