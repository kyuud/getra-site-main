@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}

    <h5> Relatório das Empresas Clientes Cadastradas </h5>

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
                                <th>Nome</th>
                                <th style="width: 120px">CNPJ</th>
                                <th style="width: 100px">Cidade</th>
                                <th style="width: 90px">Telefone</th>
                                <th style="width: 160px">Email</th>
                                <th style="width: 50px">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                            @forelse($data as $key=>$item)
                                <tr>
                                    <td class="text-center pt-2">
                                        {{ $key+1 }}
                                    </td>

                                    <td>{{$item->name}}</td>
                                    <td>{{formatCnpjCpf($item->cnpj)}}</td>
                                    <td>{{$item->city}}</td>
                                    <td>{{formatPhone($item->phone)}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-success">Ativo</span>
                                        @else
                                            <span class="badge badge-warning">Inativo</span>
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

    <br style="clear: both"/>

@endsection

