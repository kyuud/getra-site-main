@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}
@push('css-extra')
<style>
    .card {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Evita que a borda seja cortada pelo conteúdo interno */
    }

    .bg-light {
        background-color: #f8f9fa !important;
    }

    .rounded {
        border-radius: 10px;
    }

    .mb-4 {
        margin-bottom: 2rem !important;
    }

    h5 {
        margin-bottom: 1.5rem;
        color: #007bff;
        text-transform: uppercase;
        font-weight: bold;
        text-align: center;
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        border-radius: 15px 15px 0 0;
        font-weight: bold;
    }

    .card-body {
        padding: 2rem;
    }

    .form-group label {
        font-weight: bold;
        color: #343a40; /* Cor escura para os rótulos */
    }

    .form-group .bg-light {
        padding: 1rem;
        color: #343a40;
    }

    .alert {
        border-radius: 15px;
    }

    /* Estiliza o botão de download */
    .btn-download {
        background-color: #28a745;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 0.5rem 1rem;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-download:hover {
        background-color: #218838;
    }

    /* Estiliza o link de download */
    .download-link {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
        transition: color 0.3s ease;
    }

    .download-link:hover {
        color: #0056b3;
    }
</style>
@endpush

@push('js-extra')
@endpush

@section('content')
    {{-- CONTEÚDO TOTAL DA PÁGINA --}}
    <h5>Relatório de Exames Adicionais por empresa</h5>

    <div class="container">
        @forelse($data as $item)
            <div class="card mb-3">
                <div class="card-header">
                    Informações da Empresa
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome da Empresa</label>
                                <div class="bg-light rounded">{{ $item->company->name }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNPJ da Empresa</label>
                                <div class="bg-light rounded">{{ formatCnpjCpf($item->company->cnpj) }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Cidade</label>
                                <div class="bg-light rounded">{{ $item->company->city }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <div class="bg-light rounded">{{ $item->company->email }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome do Funcionário</label>
                            <div class="bg-light rounded">{{ $item->employee_name }}</div>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data do exame</label>
                                <div class="bg-light rounded">{{ formatDate($item->examdate, 'd/m/Y') }}</div>
                            </div>
                        </div>



                    {{-- <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Descontos</label>
                                <div class="bg-light rounded">{{ formatMoney($item->discounts) }}</div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Valor do exame</label>
                                <div class="bg-light rounded">{{ formatMoney($item->examslist->value_amount) }}</div>
                            </div>
                        </div>
                    


                        {{-- <div class="col-md-12">
                            <div class="form-group">
                                <label>Observações</label>
                                <div class="bg-light rounded">{{ $item->obs }}</div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning" role="alert">
                Nenhum dado disponível.
            </div>
        @endforelse
    </div>
@endsection
