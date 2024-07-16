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

    {{-- MENSAGENS DE ERROS --}}
    @if( Session::has('errors') )

        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Opss!
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        </div>

    @endif

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Logs Cadastrados</h4>
                </div>
                <div class="card-body">


                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6"></div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            {!! Form::open(['route' => 'logs.search', 'class' => 'form form-search form-ds']) !!}

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
                    {!! Form::open(['route' => 'logs.destroyMultWithAjax', 'id'=>'formDestroyMult']) !!}

                        {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                        <table width="100%" class="table table-striped table-hover" id="tableExport">
                            <thead>
                                <tr>
                                    <th style="width:25%;">Nome do Usuário</th>
                                    <th style="width:35%;">E-mail</th>
                                    <th style="width:15%;">Data & Hora</th>
                                    <th style="width:15%;">IP de Acesso</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                                @forelse($data as $log)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img alt="image" class="mr-3 rounded-circle" width="40"
                                                    src='{{url("uploads/users/".$log->user->image)}}'>
                                                <div class="media-body">
                                                    <div class="media-title">{{$log->user->name}}</div>
                                                    <div class="text-job text-muted">{{$log->roleUser->roleDash->label}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$log->user->email}}
                                        </td>
                                        <td>{{ date('d-m-Y H:i:s', strtotime($log['created_at'])) }}</td>
                                        <td>{{$log->ip}}</td>
                                    </tr>

                                @empty
                                    <tr>
                                        <p>Nenhum Log Cadastrado</p>
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
                            <div class="col-md-12 col-lg-6"></div>
                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
