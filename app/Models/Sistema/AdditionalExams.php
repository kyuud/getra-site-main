<?php

namespace App\Models\Sistema;


use Illuminate\Database\Eloquent\Model;

class AdditionalExams extends Model
{
    protected $fillable = [
        
        
        'company_id',
        'employee_name',
        'examdate',
        'supplier_id',
        'exam_id',
    
    ];

    protected $casts = [
        'examdate' => 'datetime', // Garante que 'exam_date' seja tratado como uma instância do Carbon.
    ];

    protected $dates = ['examdate'];

    // Relacionamento com a Empresa (Company)
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Relacionamento com o Fornecedor (Supplier)
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');

    }

    public function examsList()
    {
        return $this->belongsTo(ExamsList::class, 'exam_id');
    }

}
