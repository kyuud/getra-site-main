@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA

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

--}}
@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}
    <img style="display: block; margin: 20px auto; width: 20%;" src="data:image/svg+xml;base64,<?php echo base64_encode(file_get_contents(base_path('storage\images\logonova-getra.svg'))); ?>" alt="logo">
    <h1 style="color: #028738; text-align: center; font-size: 24px;">Relatório Geral - Exames Adicionais</h1>

    <div class="row" style="font-size: 9pt; margin: 20px 0;">
        <div class="col-12">
            <div class="card" style="background-color: #f5f5f5; border-radius: 10px; border: none; margin-bottom: 30px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                <div class="card-body" style="padding: 20px 25px; color: #555;">

                    {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                    <table class="table table-striped table-hover" id="tableExport">
                        <thead style="background-color: #028738; color: #fff;">
                        <tr>
                            <th style="width: 5%; text-align: center;">#</th>
                            <th style="width: 20%;">Nome da Empresa</th>
                            <th style="width: 15%;">CNPJ</th>
                            <th style="width: 15%;">Valor do Exame</th>
                            <th style="width: 15%;">Data do Exame</th>
                            <th style="width: 15%;">Data de Vencimento</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                        @forelse($data as $key=>$item)
                            <tr>
                                <td style="text-align: center;">{{ $key+1 }}</td>
                                <td style="text-align: center;">{{ $item->company->name }}</td>
                                <td style="text-align: center;">{{ formatCnpjCpf($item->company->cnpj) }}</td>
                                <td style="text-align: center;">{{ formatMoney($item->examslist->value_amount) }}</td>
                                <td style="text-align: center;">{{ formatDate($item->examdate, 'd/m/Y') }}</td>
                                <td style="text-align: center;">{{ formatDate($item['duedate'], 'd/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; color: #888;">Nenhum Registro Cadastrado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>

                    <h6 style="color: #028738; margin-top: 20px; text-align: right;">Total de registros: {{ $qty }}</h6>

                    <script type='text/php'>
                        if (isset($pdf)) {
                            $pdf->page_text(750, $pdf->get_height() - 60, "{PAGE_NUM} de {PAGE_COUNT}", null, 12, array(0,0,0, 0.8));
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .table {
            width: 100%;
            margin-bottom: 0;
        }

        .table th, .table td {
            padding: 12px;
        }

        h1, h6 {
            margin-bottom: 0;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .card {
            border: none;
        }
    </style>

    <br style="clear: both" />

@endsection
