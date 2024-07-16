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
                    <h4>Aso</h4>
                </div>
                <div class="card-body">

                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRA UM NOVO REGISTRO --}}
                            <a href="{{route('aso.create')}}" class="btn btn-icon icon-left btn-success">
                                <i class="fas fa-plus-square"></i> Novo Exame
                            </a>

                            {{-- BOTÃO PARA GERAR RELATÓRIO --}}
                            <a href="{{route('aso.pdf')}}" target="_blank" class="btn btn-icon icon-left btn-outline-danger">
                                <i class="fas fa-file-pdf"></i> Gerar PDF
                            </a>

                            @can("aso-clearTable")
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

                        <div class="col-md-3 col-lg-3">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            {!! Form::open(['route' => 'aso.search-period', 'class' => 'form form-search form-ds']) !!}

                            <div class="input-group">

                                {!! Form::date('date1', null, ['class' => 'form-control', 'required', 'style'=> 'padding-left: 8px']) !!}
                                {!! Form::date('date2', null, ['class' => 'form-control', 'required', 'style'=> 'padding-left: 8px']) !!}

                                <div class="input-group-btn">
                                    {{ Form::button('<i class="fas fa-search"></i>',
                                    ['type' => 'submit', 'class' => 'btn btn-primary', 'style'=>'min-height: 41px'])}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                        <div class="col-md-3 col-lg-3">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            {!! Form::open(['route' => 'aso.search', 'class' => 'form form-search form-ds']) !!}

                            <div class="input-group">

                                {!! Form::text('key-search', null, ['placeholder' => 'Pesquisar na tabela:', 'class' => 'form-control offset-12 col-lg-8', 'required']) !!}

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
                    {!! Form::open(['route' => 'aso.destroyMultWithAjax', 'id'=>'formDestroyMult']) !!}

                    {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                    <table width="100%" class="table table-striped table-hover" id="tableExport">
                        <thead>
                            <tr>
                                <th class="text-center pt-3">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                            class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th style="width:5%;">#</th>
                                <th style="width:auto;">Empresa</th>
                                <th style="width:auto;">Funcionário</th>
                                <th style="width:auto;">Data do Exame</th>
                                <th style="width:auto;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                            @forelse($data as $item)
                                <tr>
                                    <td class="text-center pt-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="{{$item->id}}" name="ids[]" value="{{$item->id}}">
                                            <label for="{{$item->id}}" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>

                                    <td>{{$item->id}}</td>
                                    <td>{{$item->employee->company->name}}</td>
                                    <td>{{$item->employee->name}}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($item['created_at'])) }}</td>
                                    <td>
                                        {{-- BOTÃO PARA BAIXAR O PDF --}}
                                        <a href="{{'../uploads/asos/pdfs/' . $item->pdf}}" class="btn btn-primary"
                                        data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                        target="_blank" data-original-title="Baixar PDF para assinar!"> PDF
                                            <i class="fas fa-download"></i>
                                        </a>

                                        {{-- BOTÃO PARA BAIXAR O PDF DIGITAL --}}
                                        <a href="{{'../uploads/asos/digpdfs/' . $item->digpdf}}" class="btn btn-dark"
                                        data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                        target="_blank" data-original-title="Baixar PDF assinado digital!"> PDF
                                            <i class="fas fa-download"></i>
                                        </a>

                                        {{-- BOTÃO PARA BAIXAR O XML --}}
                                        <a href="{{'../uploads/asos/xmls/' . $item->xml}}" class="btn btn-info btn-outline-info" download
                                        data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                        target="_blank" data-original-title="Baixar o XML!"> XML
                                            <i class="fas fa-download"></i>
                                        </a>

                                        {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                        @can("aso-destroyFake")
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
                                    <p>Nenhum Registro Cadastrado</p>
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

                        @can("aso-destroyFake")
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