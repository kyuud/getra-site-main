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
                    <h4>Médicos Excluídos</h4>
                </div>
                <div class="card-body">


                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            @if($totalItens != 0)
                            {{-- BOTÃO PARA LIMPAR TODA TABELA --}}
                            <a id="clearTableForce" href="javascript:;"
                               class="btn btn-icon icon-left btn-outline-danger btn-dark"
                               data-toggle="tooltip"
                               data-original-title="Removerá permanentemente todos os registros da desta tabela!">
                                <i class="fas fa-window-close"></i> Limpar Tabela
                            </a>
                            @endif
                        </div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            {!! Form::open(['route' => 'doctors.search.trash', 'class' => 'form form-search form-ds']) !!}

                                <div class="input-group">

                                    {!! Form::text('key-search', null, ['placeholder' => 'Pesquisar na tabela:', 'class' => 'form-control offset-8 col-lg-4', 'required']) !!}

                                    <div class="input-group-btn">
                                        {{ Form::button('<i class="fas fa-search"></i>',
                                        ['type' => 'submit', 'class' => 'btn btn-primary', 'style'=>'min-height: 41px'])}}
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                    <br style="clear: both" />

                    {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                    {!! Form::open(['route' => 'doctors.destroyMultWithAjax', 'id'=>'formDestroyMult']) !!}

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
                                    <th>Nome</th>
                                    <th>CRM</th>
                                    <th>Especialidade</th>
                                    <th>Status</th>
                                    <th>Cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                                @forelse($data as $doctors)
                                    <tr>
                                        <td class="text-center pt-2">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                       id="{{$doctors->street}}" name="ids[]" value="{{$doctors->id}}">
                                                <label for="{{$doctors->street}}" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>

                                        <td>{{$doctors->name}}</td>
                                        <td>{{$doctors->crm}}</td>
                                        <td>{{$doctors->specialty}}</td>
                                        <td>
                                            @if($doctors->status == 1)
                                                <span class="badge badge-success">Ativo</span>
                                            @else
                                                <span class="badge badge-warning">Inativo</span>
                                            @endif

                                        </td>
                                        <td>{{ formatDate($doctors['created_at']) }}</td>
                                        <td>
                                            {{-- BOTÃO PARA EDITAR O REGISTRO --}}
                                            <a href="{{route('doctors.edit.trash', $doctors->id)}}" class="btn btn-primary"
                                               data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                               data-original-title="Visualizar mais detalhes deste item!">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- BOTÃO PARA RESTAURAR O REGISTRO --}}
                                            <a id-restore="{{$doctors->id}}" href="javascript:;" class="restore btn btn-outline-info btn-info"
                                               data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                               data-original-title="Restaurar este item!">
                                                <i class="fas fa-undo"></i>
                                            </a>

                                            {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                            <a id-remove="{{$doctors->id}}" href="javascript:;" class="remove_force btn btn-outline-danger btn-dark"
                                               data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                               data-original-title="Remover permanentemente este item!">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <p>Lixeira de médicos Vazia</p>
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
                            <div class="col-md-12 col-lg-6">
                                {{ Form::button('<i class="fas fa-minus-square"></i> Remover Selecionado(s)',
                                            ['type' => 'buttom', 'id'=>'destroyMultForce',
                                             'class' => 'btn btn-icon icon-left btn-outline-dark btn-dark card-footer-action float-right'])}}

                                {{ Form::button('<i class="fas fa-undo"></i> Restaurar Selecionado(s)',
                                            ['type' => 'buttom', 'id'=>'restoreMult',
                                             'class' => 'margin-right-10 btn btn-icon icon-left btn-outline-info btn-info card-footer-action float-right'])}}

                            </div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
