@extends('Sistema.templates.template_01')

@push('css-extra')
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
          href="{{url('Painel/light/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
@endpush

@push('js-extra')

    <script src="{{url('Painel/light/assets/bundles/datatables/datatables.min.js')}}"></script>
    <script src="{{url('Painel/light/assets/js/page/datatables.js')}}"></script>
    @include('Painel.includes.script_attendance')
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

    <section class="section">
        {{-- CONTEÚDO TOTAL DA PÁGINA --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Técnicos da Saúde</h4>
                    </div>

                    <div class="row col-sm-12">

                        @forelse($technician as $item)

                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <div class="card l-bg-green-light">
                                    <a style="text-decoration: none;"
                                       href="{{route('attendee', [$year ,$month, $day, $item->id])}}">
                                        <div class="card-statistic-3">
                                            <div class="card-icon card-icon-large"><i class="fa fa-user"></i></div>
                                            <div class="card-content">
                                                <h4 class="card-title">{{$item->name}}</h4>
                                                <span class="text-nowrap">Registros</span>

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        @empty

                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Atendimento - {{$day}}/{{$month}}/{{$year}} - {{$attendant->name}}</h4>
                </div>
                <div class="card-body">


                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRA UM NOVO REGISTRO --}}
                            <a href="{{route('attendance.create')}}" class="btn btn-icon icon-left btn-success"><i
                                        class="fas fa-plus-square"></i>
                                Novo Atendimento</a>

                            {{-- BOTÃO PARA GERAR RELATÓRIO --}}
                            <a href="{{route('attendance.pdf')}}" target="_blank"
                               class="btn btn-icon icon-left btn-outline-danger">
                                <i class="fas fa-file-pdf"></i> Gerar PDF</a>

                            {{-- BOTÃO PARA VOLTAR UMA PÁGINA --}}
                            <a class="btn btn-primary" onclick="history.go(-1);" style="cursor:pointer; color: #fff">Voltar</a>

                        </div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            {!! Form::open(['route' => 'attendance.search', 'class' => 'form form-search form-ds']) !!}

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

                    <br style="clear: both"/>

                    {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                    {!! Form::open(['route' => 'attendee.destroyMultWithAjax', 'id'=>'formDestroyMult']) !!}

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
                            <th>Horário</th>
                            <th>Funcionário (Vida)</th>
                            <th>Empresa (Cliente)</th>
                            <th>CNPJ</th>
                            <th>Cargo</th>
                            <th>Modalidade</th>
                            <th>Exame</th>
                            <th>Realizado</th>
                            <th>Médico</th>
                            <th>Observações</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>

                        {{-- LISTANDO REGISTROS DINAMICAMENTE --}}

                        @forelse($attendance as $item)

                            <tr>
                                <td class="text-center pt-2">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                               id="{{$item->id}}" name="ids[]" value="{{$item->id}}">
                                        <label for="{{$item->id}}" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </td>

                                <td>{{ date('H:i', strtotime($item['attendance_date'])) }}</td>
                                <td>{{$item->employee}}</td>
                                <td>{{$item->company}}</td>
                                <td>{{formatCnpjCpf($item->cnpj)}}</td>
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
                                <td>
                                    {{-- BOTÃO PARA EDITAR O REGISTRO --}}
                                    <a href="{{route('attendance.edit', $item->id)}}" class="btn btn-primary"
                                       data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                       data-original-title="Visualizar mais detalhes deste item!">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                    @can("attendance-destroyFake")
                                        <a id-remove="{{$item->id}}" href="javascript:;"
                                           class="remove btn btn-outline-danger btn-danger"
                                           data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                           data-original-title="Remover este item!">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endcan

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <p>Nenhum Atendimento Cadastrado</p>
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
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    {{-- PAGINAÇÃO DA TABELA --}}
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6">

                        </div>

                        @can("attendance-destroyFake")
                            <div class="col-md-12 col-lg-6">
                                {{ Form::button('<i class="fas fa-minus-square"></i> Remover Selecionado(s)',
                                            ['type' => 'buttom', 'id'=>'destroyMult',
                                            'class' => 'btn btn-icon icon-left btn-outline-danger btn-danger card-footer-action float-right'])}}
                            </div>
                        @endcan

                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
