<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{

    protected $fillable = [
        'name',
        'cnpj',
        'deleted_at',
    ];

    protected $table = "supplier";

    public function exams()
    {
        return $this->hasMany(ExamsList::class);
    }

    public function additionalExams()
    {
        return $this->hasMany(AdditionalExams::class, 'supplier_id', 'id');
    }
}