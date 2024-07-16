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



        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Exames Adicionais</h4>
                </div>
                <div class="card-body">
                    <div class="row col-12 col-md-12 col-lg-12">
                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRAR UM NOVO REGISTRO --}}
                            <a href="{{route('additionalexams.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus-square"></i> Novo Registro</a>

                            {{-- BOTÃO PARA GERAR RELATÓRIO --}}
                            <a href="{{route('additionalexams.pdf')}}" target="_blank" class="btn btn-icon icon-left btn-outline-danger">
                                <i class="fas fa-file-pdf"></i> Gerar PDF</a>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            <form action="{{ route('additionalexams.search') }}" method="POST" class="form form-search form-ds">
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
                            {{-- Filtro de Data --}}
                            <form method="GET" action="{{ route('additionalexams.index') }}">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3">
                                        <div class="col-auto">
                                            <label for="start_date" class="col-form-label">Data Inicial:</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date">
                                        </div>
                                        <div class="col-auto">
                                            <label for="end_date" class="col-form-label">Data Final:</label>
                                            <input type="date" class="form-control" id="end_date" name="end_date">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                            {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                            <form action="{{ route('additionalexams.destroyMultWithAjax') }}" method="POST" id="formDestroyMult">
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
                                            <th style="width:5%;">ID</th>
                                            <th style="width:auto;">Empresa</th>
                                            <th style="width:auto;">Funcionário</th>
                                            <th style="width:auto;">Honorários</th>
                                            <th style="width:auto;">Data do exame</th>
                                            <th style="width:auto;">Ações</th>
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
                                            <td>{{$item->employee_name}}</td>

                                            {{-- Exibindo o value_amount de exams_list --}}
                                            <td>{{ formatMoney($item->examsList->value_amount) }}</td>

                                            <td>{{ formatDate($item['created_at'], 'd/m/Y') }}</td>
                                            {{-- <td>{{ formatDate($item['duedate'], 'd/m/Y') }}</td> --}}

                                            <td>
                                                {{-- BOTÃO PARA BAIXAR O PDF --}}
                                                <a href="{{ route('additionalexams.pdf.company', $item->company_id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Baixar este item!" target="_blank">
                                                    PDF <i class="fas fa-download"></i>
                                                </a>

                                                {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                                @can("additionalexams-destroyFake")
                                                    <a id-remove="{{ $item->id }}" href="javascript:;" class="remove btn btn-outline-danger btn-danger btn-sm" data-toggle="tooltip" title="Remover este item!">
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

                                    @can("additionalexams-destroyFake")
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