@extends('Painel.templates.template_01')

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
                    <h4>Endereços Cadastrados</h4>
                </div>
                <div class="card-body">


                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRA UM NOVO REGISTRO --}}
                            <a href="{{route('companies.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus-square"></i> Nova Endereço</a>

                            @can("company-clearTable")
                            @if($totalItens != 0)
                                {{-- BOTÃO PARA LIMPAR TODA TABELA --}}
                                <a id="clearTable" href="javascript:;"
                                class="btn btn-icon icon-left btn-outline-warning btn-warning"
                                data-toggle="tooltip"
                                data-original-title="Excluirá todos os registros dessa tabela!">
                                    <i class="fas fa-window-close"></i> Limpar Tabela
                                </a>
                            @endif
                            @endcan
                        </div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            <form action="{{ route('companies.search') }}" method="POST" class="form form-search form-ds">
                                @csrf
                            
                                <div class="input-group">
                                    <input type="text" name="key-search" placeholder="Pesquisar na tabela:" class="form-control offset-8 col-lg-4"
                                        required value="{{ old('key-search') }}">
                            
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" style="min-height: 41px">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            </div>
                            
                            <br style="clear: both" />
                            
                            {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                            <form action="{{ route('companies.destroyMultWithAjax') }}" method="POST" id="formDestroyMult">
                                @csrf
                            
                                {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                                <table class="table table-striped table-hover" id="tableExport">
                                    <thead>
                                        <tr>
                                            <th class="text-center pt-3">
                                                <div class="custom-checkbox custom-checkbox-table custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                                        class="custom-control-input" id="checkbox-all">
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>Rua</th>
                                            <th>Bairro</th>
                                            <th>Número</th>
                                            <th>Cidade</th>
                                            <th>Estado</th>
                                            <th>Status</th>
                                            <th>Cadastro</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
                                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                                        @forelse($data as $companies)
                                            <tr>
                                                <td class="text-center pt-2">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                            id="{{ $companies->title }}" name="ids[]" value="{{ $companies->id }}">
                                                        <label for="{{ $companies->title }}" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </td>
                            
                                                <td>{{ $companies->street }}</td>
                                                <td>{{ $companies->neighborhood }}</td>
                                                <td>{{ $companies->number }}</td>
                                                <td>{{ $companies->city }}</td>
                                                <td>{{ $companies->state }}</td>
                                                <td>
                                                    @if($companies->status == 1)
                                                        <span class="badge badge-success">Ativo</span>
                                                    @else
                                                        <span class="badge badge-warning">Inativo</span>
                                                    @endif
                            
                                                </td>
                                                <td>{{ date('d-m-Y H:i:s', strtotime($companies['created_at'])) }}</td>
                                                <td>
                                                    {{-- BOTÃO PARA EDITAR O REGISTRO --}}
                                                    <a href="{{ route('companies.edit', $companies->id) }}" class="btn btn-primary"
                                                        data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                                        data-original-title="Visualizar mais detalhes deste item!">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                            
                                                    {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                                    @can("company-destroyFake")
                                                    <a id-remove="{{ $companies->id }}" href="javascript:;" class="remove btn btn-outline-danger btn-danger"
                                                        data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                                        data-original-title="Remover este item!">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    @endcan
                            
                                                </td>
                                            </tr>
                            
                                        @empty
                                            <tr>
                                                <p>Nenhum Endereço Cadastrado</p>
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
                                                    {{ "$itensCurrent registros de $totalItens no total" }}
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
                            
                                    @can("company-destroyFake")
                                    <div class="col-md-12 col-lg-6">
                                        <button type="button" id="destroyMult"
                                            class="btn btn-icon icon-left btn-outline-danger btn-danger card-footer-action float-right">
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
