<?php

    namespace App\Models\Sistema;

    use Illuminate\Database\Eloquent\Model;

    class Training extends Model
    {
        protected $fillable = [
            "deleted_at",
            "start",
            "treinamento",
            "tipo",
            "qtd",
            "deadline",
            "status",
            "company_id"
        ];

        public function company()
        {
            return $this->belongsTo(Company::class);
        }
        
    }
