<?php

namespace App\Livewire;

use App\Models\Sistema\Supplier;
use App\Models\Sistema\AdditionalExams;
use App\Models\Sistema\Company;
use Livewire\Component;

class Form extends Component
{
    public $companies;
    public $company_id;
    public $employee;
    public $examdate;
    public $suppliers = null;
    public $examsList;
    public $supplierId;
    public $examId;
    public $examValueAmount;
    public $examValueFee;

    public function mount()
    {
        // Obter empresas em ordem alfabética
        $this->companies = Company::where('deleted_at', null)
            ->where('status', '1')
            ->orderBy('name', 'asc')
            ->pluck("name", "id")
            ->prepend('Selecione a empresa', ''); // Adicionar "Selecione a empresa" como primeiro item
    
        $supplier = new Supplier;
        $this->suppliers = $supplier->orderBy('name')->get();
        
        // Inicializa a lista de exames
        $this->examsList = [];
    }
    
    public function filterExamsBySupplier()
    {
        if ($this->supplierId) {
            $selectedSupplier = Supplier::find($this->supplierId);
            $this->examsList = $selectedSupplier->exams()->orderBy('exam_name')->get()->toArray();
        } else {
            $this->examsList = [];
        }
    
        $this->examId = null;
        $this->examValueAmount = null;
    }   

    public function updateExamValueAmount()
    {
        if ($this->examId && count($this->examsList) > 0) {
            $selectedExam = collect($this->examsList)->where('id', $this->examId)->first();

            if ($selectedExam) {
                $this->examValueAmount = $selectedExam['value_amount'];
            } else {
                $this->examValueAmount = null;
            }
        } else {
            $this->examValueAmount = null;
        }
    }

    public function saveFormData()
    {

        // dd($this->company_id, $this->employee, $this->examdate, $this->examId);
        $this->validate([
            'company_id' => 'required',
            'supplierId' => 'required',
            'examId' => 'required',
            'employee' => 'required',
            'examdate' => 'required|date',
            
        ]);

        AdditionalExams::create([
            'company_id' => $this->company_id,
            'employee_name' => $this->employee,
            'examdate' => $this->examdate,
            'supplier_id' => $this->supplierId,
            'exam_id' => $this->examId,
        ]);

        session()->flash('message', 'Exame salvo com sucesso!');
        $this->resetFields();


    }

    private function resetFields()
    {
        $this->company_id = null;
        $this->employee = null;
        $this->examdate = null;
        $this->supplierId = null;
        $this->examId = null;
        $this->examValueAmount = null;
    }

    public function render()
    {
        return view('livewire.form');
    }
}
