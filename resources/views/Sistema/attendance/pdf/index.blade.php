@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}

    <h5>Relatório de Atendimento</h5>

    <div class="row" style="font-size: 9pt">
        <div class="col-12" style="position: relative;width: 100%;padding-right: 15px;padding-left: 15px;">
            <div class="card" style=" background-color: #fff;
    border-radius: 10px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1)">
                <div class="card-body" style="background-color: transparent; padding: 20px 25px">

                    {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                    <table width="100%" class="table table-striped table-hover" id="tableExport" style="border-collapse: collapse !important;">
                        <thead>
                        <tr>
                            <th style="width:5%;text-align: center !important;padding-top: 1rem !important;" class="text-center pt-3" >
                                #
                            </th>
                            <th style="width:10%;">Horário</th>
                            <th style="width:auto;">Funcionário (Vida)</th>
                            <th style="width:auto;">Empresa (Cliente)</th>
                            <th style="width:auto;">CNPJ</th>
                            <th style="width:auto;">Cargo</th>
                            <th style="width:auto;">Modalidade</th>
                            <th style="width:auto;">Exame</th>
                            <th style="width:auto;">Realizado</th>
                            <th style="width:auto;">Médico</th>
                            <th style="width:25%;">Observações</th>

                        </tr>
                        </thead>
                        <tbody>

                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                        @forelse($data as $key=>$item)
                            <tr>
                                <td class="text-center pt-2" style="text-align: center !important;padding-top: 0.5rem !important;">
                                    {{ $key+1 }}
                                </td>
                                <td>{{ date('H:i', strtotime($item['attendance_date'])) }}</td>
                                <td>{{$item->employee}}</td>
                                <td>{{$item->company}}</td>
                                <td>{{$item->cnpj}}</td>
                                <td>{{$item->occupation}}</td>
                                <td>{{$item->modality->name}}</td>
                                <td>{{$item->exam->name}}</td>
                                <td>
                                    @if($item->accomplished == 1)
                                        <span class="badge badge-success">Realizado</span>
                                    @else
                                        <span class="badge badge-warning">Não realizado</span>
                                    @endif

                                </td>
                                <td>{{$item->doctor->name}}</td>
                                <td>{{$item->observation}}</td>

                            </tr>

                        @empty
                            <tr>
                                <p>Nenhum Registro Cadastrado</p>
                            </tr>
                        @endforelse

                        <?php var_dump($data) ?>

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

