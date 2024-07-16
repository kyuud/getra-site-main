<?php

namespace App\Models\Sistema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExamsList extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'supplier_id',  
        'exam_name',
        'value_amount',
        'value_fee',
        'deleted_at',
    ];

    protected $table = "exams_list";

    public function supplier()
    {
        return $this->belongsTo('App\Models\Sistema\Supplier', 'supplier_id');
    }

    public function additionalExams()
    {
        return $this->hasMany(AdditionalExams::class, 'exam_id');
    }
}
