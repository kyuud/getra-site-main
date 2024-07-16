@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}

    <h5>Relatório Geral - Fornecedores
    </h5>

    <div class="row" style="font-size: 9pt">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    
                    {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                    <table width="100%" class="table table-striped table-hover" id="tableExport">
                        <thead>
                            <tr>
                                <th style="width:auto;" class="text-center pt-3">
                                    #
                                </th>
                                <th style="width:auto;">Fornecedor</th>
                                <th style="width:auto;">CNPJ</th>
                                <th style="width:auto;">Honorários</th>
                                <th style="width:auto;">Data Registro</th>

                            </tr>
                        </thead>
                        <tbody>

                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                        @foreach($data as $item)
                        <tr>
                            <td  style="width:auto; text-align: center;">
                                {{ $loop->iteration }} <!-- Usando $loop->iteration para obter o número da iteração -->
                            </td>
                            <td style="width:auto; text-align: center;">{{ $item->name }}</td>
                            <td style="width:auto; text-align: center;">{{ formatCnpjCpf($item->cnpj) }}</td>
                            <td style="width:auto; text-align: center;">
                                @php
                                    $totalValue = $item->additionalExams->sum('exam_fee');
                                @endphp
                                {{ formatMoney($totalValue) }}
                            </td>
                            <td style="width:auto; text-align: center;">{{ formatDate($item->created_at, 'd/m/Y') }}</td>


                        </tr>
                    @endforeach
                    
                    @if($data->isEmpty())
                        <tr>
                            <td colspan="7">
                                <p>Nenhum Registro Cadastrado</p>
                            </td>
                        </tr>
                    @endif
                    

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

