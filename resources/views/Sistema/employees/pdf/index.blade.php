@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}

    <h5>{{$title}}</h5>

    <div class="row" style="font-size: 9pt">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                    <table width="100%" class="table table-striped table-hover table-bordered" id="tableExport">
                        <thead>
                            <tr>
                                <th style="width:5%;" class="text-center pt-3">
                                    #
                                </th>
                                <th>Empresa</th>
                                <th>Funcionário</th>
                                <th style="width: 70px">Nascimento</th>
                                <th style="width: 90px">Cargo</th>
                                <th style="width: 90px">CPF</th>
                                <th style="width: 40px">eSocial</th>
                                <th style="width: 45px">Status</th>
                                <th style="width: 60px">Cadastro</th>
                            </tr>
                        </thead>
                        <tbody>

                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                        @forelse($data as $key=>$item)
                            <tr>
                                <td class="text-center pt-2">
                                    {{ $key+1 }}
                                </td>

                                <td>{{$item->company->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{formatDate($item->birth, 'd/m/Y')}}</td>
                                <td>{{$item->occupation}}</td>
                                <td>{{formatCnpjCpf($item->cpf)}}</td>
                                <td>{{$item->matricula}}</td>
                                <td>
                                    @if($item->status == 1)
                                        <span class="badge badge-success">Ativo</span>
                                    @else
                                        <span class="badge badge-warning">Inativo</span>
                                    @endif

                                </td>
                                <td>{{ formatDate($item['created_at'], 'd/m/Y') }}</td>

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

