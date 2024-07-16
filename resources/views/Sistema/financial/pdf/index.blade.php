@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}

    <h5>Relatório Financeiro Geral</h5>

    <div class="row" style="font-size: 9pt">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                    <table width="100%" class="table table-striped table-hover" id="tableExport">
                        <thead>
                            <tr>
                                <th style="width:5%;" class="text-center pt-3">
                                    #
                                </th>
                                <th style="width:25%;">Nome da empresa</th>
                                <th style="width:auto;">CNPJ</th>
                                <th style="width:auto;">Honorários</th>
                                <th style="width:auto;">Data Registro</th>
                                <th style="width:auto;">Data Vencimento</th>
                                <th style="width:10%;">Concluído</th>
                            </tr>
                        </thead>
                        <tbody>

                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                        @forelse($data as $key=>$item)
                            <tr>
                                <td  style="width:auto; text-align: center;"">
                                    {{ $key+1 }}
                                </td>
                                <td style="width:auto; text-align: center;">{{$item->company->name}}</td>

                                <td style="width:auto; text-align: center;">{{formatCnpjCpf($item->company->cnpj)}}</td>
                                <td style="width:auto; text-align: center;">{{ formatMoney($item->fees) }}</td>
                                <td style="width:auto; text-align: center;">{{ formatDate($item['created_at'], 'd/m/Y') }}</td>
                                <td style="width:auto; text-align: center;">{{ formatDate($item['duedate'], 'd/m/Y') }}</td>
                                <td style="width:auto; text-align: center;">
                                    @if($item->status == 1)
                                        <span class="badge badge-success">Sim</span>
                                    @else
                                        <span class="badge badge-warning">Não</span>
                                    @endif

                                </td>
                            </tr>

                            @empty
                                <tr>
                                    <p>Nenhum Registro Cadastrado</p>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>

                    <h6>Total de registros: {{ $qty }}</h6>

                    <script type='text/php'>
                        if (isset($pdf))
                        {
                            $pdf->page_text(750, $pdf->get_height() - 60, "{PAGE_NUM} de {PAGE_COUNT}", null, 12, array(0,0,0, 0.8));
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>

    <br style="clear: both" />

@endsection

