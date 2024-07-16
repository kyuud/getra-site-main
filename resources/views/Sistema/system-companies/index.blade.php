@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}
@push('css-extra')
    <link rel="stylesheet" href="{{ url('Painel/light/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ url('Painel/light/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <style>
        /* CSS personalizado para reduzir o espaçamento entre os campos */
        .table td, .table th {
            padding: 0.3rem; /* Ajuste o valor conforme necessário */
            white-space: nowrap; /* Impede quebra de linha dentro das células */
        }
        .form-inline .form-group {
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .btn {
            padding: 0.3rem 0.6rem;
        }
        .custom-checkbox {
            margin: 0;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
@endpush

@push('js-extra')
    <script src="{{ url('Painel/light/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('Painel/light/assets/js/page/datatables.js') }}"></script>
    @include('Painel.includes.script')
@endpush

@section('content')

    {{-- MENSAGENS DE SUCESSO --}}
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Sucesso
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                {!! Session::get('success') !!}
                <a href="{{ route('download.updated_companies') }}">Clique aqui para baixar o arquivo</a>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Clientes Cadastrados</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6 col-lg-6 mb-2">
                            {{-- BOTÃO PARA CADASTRAR UM NOVO REGISTRO --}}
                            <a href="{{ route('system-companies.create') }}" class="btn btn-success">
                                <i class="fas fa-plus-square"></i> Novo Cliente
                            </a>
                            {{-- BOTÃO PARA GERAR RELATÓRIO --}}
                            <a href="{{ route('system-companies.pdf') }}" target="_blank" class="btn btn-outline-danger">
                                <i class="fas fa-file-pdf"></i> Gerar PDF
                            </a>
                        </div>
                    </div>
                    @can("system-company-clearTable")
                            <div class="row mb-3">
                            <div class="col-md-6 col-lg-6 mb-2">
                                {{-- BOTÃO PARA UPLOAD DE ARQUIVO EXCEL --}}
                                <form action="{{ route('process.upload') }}" method="post" enctype="multipart/form-data" class="btn btn-success">
                                    @csrf
                                    <label for="excel_file" class="btn btn-outline-danger mb-0">
                                        <i class="fas fa-upload"></i> Importar Excel
                                        <input type="file" name="excel_file" id="excel_file" accept=".xlsx" style="display: none;" onchange="displayFileName(this);">
                                    </label>
                                    <span id="file_name_display" class="ml-2"></span>
                                    <button type="submit" class="btn btn-info ml-2">Enviar</button>
                                </form>
                            </div>
                        </div>
                    @endcan

                    <style>
                        #file_name_display {
                            display: block;
                            margin-top: 10px;
                            padding: 10px;
                            background-color: #f0f0f0;
                            border: 1px solid #ccc;
                            border-radius: 5px;
                        }
                    </style>

                    <script>
                        function displayFileName(input) {
                            var fileNameDisplay = document.getElementById('file_name_display');
                            if (input.files.length > 0) {
                                fileNameDisplay.textContent = 'Arquivo selecionado: ' + input.files[0].name;
                            } else {
                                fileNameDisplay.textContent = '';
                            }
                        }
                    </script>

                    <div class="row mb-3">
                        <div class="col-12">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            <form action="{{ route('system-companies.search') }}" method="POST" class="form-inline float-right">
                                @csrf
                                <div class="form-group mb-2">
                                    <input type="text" name="key-search" placeholder="Pesquisar na tabela:" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2 ml-2">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <form action="{{ route('system-companies.destroyMultWithAjax') }}" method="post" id="formDestroyMult">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Nome</th>
                                        <th>CNPJ</th>
                                        <th>Cidade</th>
                                        <th>Telefone</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                                    @forelse($data as $item)
                                        <tr>
                                            <td class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                    <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-{{$item->id}}" name="ids[]" value="{{$item->id}}">
                                                    <label for="checkbox-{{$item->id}}" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>{{$item->name}}</td>
                                            <td>{{ formatCnpjCpf($item->cnpj) }}</td>
                                            <td>{{$item->city}}</td>
                                            <td>{{ formatPhone($item->phone) }}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                @if($item->status == 1)
                                                    <span class="badge badge-success">Ativo</span>
                                                @else
                                                    <span class="badge badge-warning">Inativo</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- BOTÃO PARA EDITAR O REGISTRO --}}
                                                <a href="{{ route('system-companies.edit', $item->id) }}" class="btn btn-primary" data-toggle="tooltip" data-original-title="Visualizar mais detalhes deste item!">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                                @can("system-company-destroyFake")
                                                    <a id-remove="{{$item->id}}" href="javascript:;" class="remove btn btn-danger" data-toggle="tooltip" data-original-title="Remover este item!">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8">Nenhum Cliente Cadastrado</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12 col-md-6">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">
                                            {{ "$itensCurrent registros de $totalItens no total" }}
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="float-right">
                                    @if(isset($dataForm))
                                        {!! $data->appends($dataForm)->links() !!}
                                    @else
                                        {!! $data->links() !!}
                                    @endif
                                </div>
                            </div>
                        </div>

                        @can("system-company-destroyFake")
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="button" id="destroyMult" class="btn btn-danger float-right">
                                        <i class="fas fa-minus-square"></i> Remover Selecionado(s)
                                    </button>
                                </div>
                            </div>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection