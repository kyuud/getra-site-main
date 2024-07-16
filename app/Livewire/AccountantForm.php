<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sistema\Accountant;
use Illuminate\Support\Facades\Validator;

class AccountantForm extends Component
{
    public $name;
    public $cnpj_cpf;
    public $comission;

    protected $rules = [
        'name' => 'required|string|max:255',
        'cnpj_cpf' => 'required|string|max:18|unique:accountants,cnpj_cpf',
        'comission' => 'nullable|numeric'
    ];

    public function submit()
    {
        $validatedData = $this->validate();

        $accountant = new Accountant();
        $accountant->fill($validatedData);
        $accountant->save();

        session()->flash('message', 'Contador cadastrado com sucesso.');

        $this->reset();  // Reseta todos os campos para inclusão de novo registro
    }

    public function render()
    {
        return view('livewire.accountant-form');
    }
}