<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sistema\Supplier;

class SupplierForm extends Component
{
    public $name;
    public $cnpj;

    protected $rules = [
        'name' => 'required|string|min:3',
        'cnpj' => 'required|string|unique:supplier,cnpj|min:11|max:14',
    ];

    public function submit()
    {
        $this->validate();

        Supplier::create([
            'name' => $this->name,
            'cnpj' => $this->cnpj,
        ]);

        session()->flash('message', 'Fornecedor criado com sucesso.');
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->name = null;
        $this->cnpj = null;

    }



    public function render()
    {
        return view('livewire.supplier-form');
    }
}

