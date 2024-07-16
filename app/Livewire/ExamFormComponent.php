<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sistema\Supplier;
use App\Models\Sistema\ExamsList;

class ExamFormComponent extends Component
{
    public $supplierId;
    public $exam_name;
    public $valueAmount;
    public $valueFee;
    public $suppliers = [];

    protected $rules = [
        'supplierId' => 'required|exists:supplier,id',
        'exam_name' => 'required|string|max:255',
        'valueAmount' => 'required|numeric',
        'valueFee' => 'required|numeric'
    ];

    public function mount()
    {
        $this->suppliers = Supplier::whereNull('deleted_at')
            ->orderBy('name', 'asc')
            ->get();
    }

    public function submit()
    {
        $this->validate();

        ExamsList::create([
            'supplier_id' => $this->supplierId,
            'exam_name' => $this->exam_name,
            'value_amount' => $this->valueAmount,
            'value_fee' => $this->valueFee
        ]);

        session()->flash('message', 'Exame criado com sucesso.');
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->supplierId = null;
        $this->exam_name = null;
        $this->valueAmount = null;
        $this->valueFee = null;
    }

    public function render()
    {
        return view('livewire.exam-form-component');
    }
}
