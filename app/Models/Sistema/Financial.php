<?php

    namespace App\Models\Sistema;

    use Illuminate\Database\Eloquent\Model;

    class Financial extends Model
    {
        protected $fillable = [
            "deleted_at",
            "city",
            "email",
            "duedate",
            "lifevalue",
            "qtd",
            "detached",
            "discounts",
            "fees",
            "obs",
            "status",
            "company_id"
        ];

        public function company()
        {
            return $this->belongsTo(Company::class);
        }

    }
