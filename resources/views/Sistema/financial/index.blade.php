@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra')
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
        href="{{url('Painel/light/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endpush

@push('js-extra')

    <script src="{{url('Painel/light/assets/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{url('Painel/light/assets/js/page/datatables.js')}}"></script>
    @include('Painel.includes.script')
@endpush


@section('content')

    {{-- MENSAGENS DE SUCESSO --}}
    @if( Session::has('success') )

        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Sucesso
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {!! Session::get('success') !!}
            </div>
        </div>

    @endif

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}
    <div class="row">

        @if(isset($novos) && !empty($novos))
            <div class="col-12">
                <div class="card" >
                    <div class="card-header">
                        <h4>
                            <span class="btn btn-warning">
                                <span class="badge badge-transparent">{{count($novos)}}</span>
                            </span>
                            Novo(s) cliente(s) que precisa(m) ser inserido(s) no financeiro!
                        </h4>
                    </div>
                    <div class="card-body" style="max-height: 300px; overflow: auto; margin-bottom: 20px">
                        @foreach($novos as $novo)
                            <div class="alert alert-info show fade">
                                <div class="alert-ico">
                                    <i class="far fa-lightbulb"></i>
                                    <b>Nome</b>: {{$novo->name}} &nbsp; | &nbsp;
                                    <b>CNPJ</b>: {{$novo->cnpj}} &nbsp; | &nbsp;
                                    <b>Cadastrado</b>: {{$novo->created_at}} &nbsp; | &nbsp;
                                    <b>Acessar cadastro</b>:
                                    <a href="{{route('system-companies.edit', $novo->id)}}" class="btn btn-sm btn-primary"
                                       data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px" target="_blank"
                                       data-original-title="Visualizar detalhes do cadastro do cliente!">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif


        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Financeiro</h4>
                </div>
                <div class="card-body">


                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRAR UM NOVO REGISTRO --}}
                            <a href="{{route('financial.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus-square"></i> Novo Registro</a>

                            {{-- BOTÃO PARA GERAR RELATÓRIO --}}
                            <a href="{{route('financial.pdf')}}" target="_blank" class="btn btn-icon icon-left btn-outline-danger">
                                <i class="fas fa-file-pdf"></i> Gerar PDF</a>

                            {{-- @can("financial-clearTable")
                            @if($totalItens != 0)
                                BOTÃO PARA LIMPAR TODA TABELA
                                <a id="clearTable" href="javascript:;"
                                class="btn btn-icon icon-left btn-outline-warning btn-warning"
                                data-toggle="tooltip"
                                data-original-title="Excluirá todos os registros dessa tabela!">
                                    <i class="fas fa-window-close"></i> Limpar Tabela
                                </a>
                            @endif
                            @endcan --}}
                        </div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            <form action="{{ route('financial.search') }}" method="POST" class="form form-search form-ds">
                                @csrf

                                <div class="input-group">
                                    <input type="text" name="key-search" placeholder="Pesquisar na tabela:" class="form-control offset-8 col-lg-4" required>
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" style="min-height: 41px"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            </div>

                            <br style="clear: both" />

                            {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                            <form action="{{ route('financial.destroyMultWithAjax') }}" method="POST" id="formDestroyMult">
                                @csrf

                                {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                                <table width="100%" class="table table-striped table-hover" id="tableExport">
                                    <thead>
                                        <tr>
                                            <th class="text-center pt-3">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th style="width:5%;">#</th>
                                            <th style="width:auto;">Nome da empresa</th>
                                            <th style="width:15%;">CNPJ</th>
                                            <th style="width:auto;">Honorários</th>
                                            <th style="width:auto;">Data Registro</th>
                                            <th style="width:auto;">Data Vencimento</th>
                                            <th style="width:auto;">Concluído</th>
                                            <th style="width:15%;">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                                        @forelse($data as $item)
                                        <tr>
                                            <td class="text-center pt-2">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="{{$item->id}}" name="ids[]" value="{{$item->id}}">
                                                    <label for="{{$item->id}}" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>

                                            <td>{{$item->id}}</td>
                                            <td>{{$item->company->name}}</td>

                                            <td>{{formatCnpjCpf($item->company->cnpj)}}</td>
                                            <td>{{ formatMoney($item->fees) }}</td>
                                            <td>{{ formatDate($item['created_at'], 'd/m/Y') }}</td>
                                            <td>{{ formatDate($item['duedate'], 'd/m/Y') }}</td>
                                            <td>
                                                @if($item->status == 1)
                                                <span class="badge badge-success">Sim</span>
                                                @else
                                                <span class="badge badge-warning">Não</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- BOTÃO PARA EDITAR O REGISTRO --}}
                                                <a href="{{route('financial.edit', $item->id)}}" class="btn btn-primary"
                                                    data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                                    data-original-title="Editar este item!">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                {{-- BOTÃO PARA BAIXAR O PDF --}}
                                                <a href="{{route('financial.pdf.company', $item->company_id)}}" class="btn btn-primary"
                                                    data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                                    target="_blank" data-original-title="Baixar este item!">
                                                    <i class="fas fa-download"></i>
                                                </a>

                                                {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                                @can("financial-destroyFake")
                                                <a id-remove="{{$item->id}}" href="javascript:;" class="remove btn btn-outline-danger btn-danger"
                                                    data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                                    data-original-title="Remover este item!">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="9">
                                                <p>Nenhum Registro Cadastrado</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                {{-- INFORMAÇÕES DOS REGISTROS POR PÁGINA E TOTAL --}}
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item active" aria-current="page">
                                                    {{ "$itensCurrent registros de $totalItens no total"  }}
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>

                                {{-- PAGINAÇÃO DA TABELA --}}
                                <div class="row">
                                    <div class="col-12 col-md-12 col-lg-6">
                                        @if( isset($dataForm) )
                                        {!! $data->appends($dataForm)->links() !!}
                                        @else
                                        {!! $data->links() !!}
                                        @endif
                                    </div>

                                    @can("financial-destroyFake")
                                    <div class="col-md-12 col-lg-6">
                                        <button type="button" id="destroyMult" class="btn btn-icon icon-left btn-outline-danger btn-danger card-footer-action float-right" onclick="yourJavaScriptFunction()">
                                            <i class="fas fa-minus-square"></i> Remover Selecionado(s)
                                        </button>
                                    
                                    </div>
                                    @endcan

                                </div>

                            </form>
                </div>
            </div>
        </div>
    </div>

@endsection
