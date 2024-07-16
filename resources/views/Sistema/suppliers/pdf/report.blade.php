{{-- Extende o template base do painel --}}
@extends('Painel.templates.template_02')

{{-- Adiciona CSS específico para a página --}}
@push('css-extra')
<style>
    /* Melhora a visualização dos cards e componentes */
    .card, .alert {
        border-radius: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        font-weight: bold;
    }

    .card-body, .bg-light, table th, table td {
        padding: 1rem;
    }

    /* Estilos para textos e botões */
    h5, .btn-download, .download-link {
        font-weight: bold;
    }

    h5 {
        color: #007bff;
        text-align: center;
        text-transform: uppercase;
    }

    .btn-download {
        background-color: #28a745;
        color: #fff;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .download-link {
        color: #007bff;
        transition: color 0.3s;
    }

    /* Estilos para tabelas e formatações específicas */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    th, td {
        border: 1px solid #dee2e6;
        text-align: left;
    }

</style>
@endpush

{{-- Seção de conteúdo principal --}}
@section('content')
    <h5>Relatório Fornecedor</h5>

    <div class="container">
        {{-- Loop através dos dados do fornecedor --}}
        @forelse($data as $item)
            <div class="card mb-4">
                <div class="card-header">
                    Informações do Fornecedor
                </div>
                <div class="card-body">
                    {{-- Informações básicas do fornecedor --}}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Nome do Fornecedor</label>
                            <div class="bg-light rounded">{{ $item->name }}</div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>CNPJ</label>
                            <div class="bg-light rounded">{{ formatCnpjCpf($item->cnpj) }}</div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Valor a pagar</label>
                            <div class="bg-light rounded">{{ formatMoney($item->fees) }}</div>
                        </div>
                    </div>

                    {{-- Tabela de exames adicionais --}}
                    <div class="card mt-4">
                        <div class="card-header">
                            Informações dos exames adicionais
                        </div>
                        <div class="card-body">
                            @if ($item->additionalExams->isNotEmpty())
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nome do funcionário</th>
                                            <th>Data do exame</th>
                                            <th>Valor do exame</th>
                                            <th>Nome do exame</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item->additionalExams as $exam)
                                            <tr>
                                                <td>{{ $exam->employee_name }}</td>
                                                <td>{{ formatOnlyDate($exam->examdate)}}</td>
                                                <td>{{ formatMoney($exam->examsList->value_fee) }}</td>
                                                <td>{{ $exam->examsList->name }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-warning">
                                    Nenhum exame adicional disponível.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-warning">
                Nenhum dado disponível.
            </div>
        @endforelse
    </div>
@endsection
