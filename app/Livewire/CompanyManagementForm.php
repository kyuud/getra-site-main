<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sistema\Company;
use Livewire\WithFileUploads;

class CompanyManagementForm extends Component
{
    use WithFileUploads;

    public $company;
    public $companyId;
    public $name;
    public $fantasyname;
    public $street;
    public $number;
    public $neighborhood;
    public $complement;
    public $city;
    public $state;
    public $email;
    public $phone;
    public $cnpj;
    public $status = 1;
    public $inativation;
    public $lives;
    public $value_lives;
    public $pdf;
    public $observation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'fantasyname' => 'nullable|string|max:255',
        'street' => 'required|string|max:255',
        'number' => 'required|string|max:10',
        'neighborhood' => 'required|string|max:255',
        'complement' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'cnpj' => 'required|numeric',
        'status' => 'boolean',
        'inativation' => 'nullable|string|max:7',
        'lives' => 'required|numeric',
        'value_lives' => 'required|numeric',
        'pdf' => 'nullable|file|mimes:pdf',
        'observation' => 'nullable|string',
    ];

    public function mount($companyId = null)
    {
        if ($companyId) {
            $this->company = Company::find($companyId);
            $this->fill($this->company->toArray());
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->pdf) {
            $pdfPath = $this->pdf->store('clients-contracts');
            $this->pdf = $pdfPath;
        }

        if ($this->company) {
            $this->company->update($this->validate());
            session()->flash('success', 'Alteração realizada com sucesso!');
        } else {
            Company::create($this->validate());
            session()->flash('success', 'Cadastro realizado com sucesso!');
        }

        return redirect()->route('system-companies.index');
    }

    public function updatedStatus($value)
    {
        $this->dispatch('statusChanged', ['status' => $value]);
    }

    public function render()
    {
        return view('livewire.company-management-form');
    }
}
