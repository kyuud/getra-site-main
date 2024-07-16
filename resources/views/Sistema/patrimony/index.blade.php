@extends('Sistema.templates.template_01')

@push('css-extra')
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/datatables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
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
                    <h4>Cadastro de {{$title}}</h4>
                </div>
                <div class="card-body">


                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRA UM NOVO REGISTRO --}}
                            <a href="{{route('patrimony.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus-square"></i>
                                Novo Patrimônio
                            </a>

                            {{-- BOTÃO PARA GERAR RELATÓRIO --}}
                            <a href="{{route('patrimony.pdf')}}" target="_blank" class="btn btn-icon icon-left btn-outline-danger">
                                <i class="fas fa-file-pdf"></i>
                                Gerar PDF
                            </a>

                            {{-- BOTÃO PARA VOLTAR UMA PÁGINA --}}
                            <a class="btn btn-primary" style="cursor:pointer; color: #fff" href="{{ URL::previous() }}">
                                Voltar
                            </a>

                        </div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            <form action="{{route('patrimony.search')}}" method="GET" class="form form-search form-ds">

                                <div class="input-group">

                                    <input type="text" name="key-search" placeholder="Pesquisar na tabela:" class="form-control offset-8 col-lg-4" required>

                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-primary" style="min-height: 41px">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                    <br style="clear: both"/>

                    {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                    <form action="{{route('patrimony.destroyMultWithAjax')}}" method="POST" id="formDestroyMult">

                        {{-- TABELA PARA EXIBIÇÃO DOS REGISTROS --}}
                        <table class="table table-striped table-hover" id="tableExport">
                            <thead>
                            <tr>
                                <th class="text-center pt-3">
                                    <div class="custom-checkbox custom-checkbox-table custom-control">
                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                        <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Imagem</th>
                                <th>Produto</th>
                                <th>Tipo de Produto</th>
                                <th>Valor (Unitário)</th>
                                <th>Quantidade (Total)</th>
                                <th>Status</th>
                                <th>Observações</th>
                                <th>Ações</th>
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
                                    <td>
                                        <img alt="{{$item->title}}" style="max-width: 10em; -webkit-box-shadow: 0 2px 10px 0 rgba(105,103,103,0.5); box-shadow: 0 5px 15px 0 rgba(105,103,103,0.5); border: none; border-radius: unset;" src='{{ asset('storage/patrimonies/'.$item->image_url) }}'/>
                                    </td>

                                    <td>{{$item->title}}</td>
                                    <td>{{$item->product->product}}</td>
                                    <td>{{formatMoney($item->value)}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>
                                        @if($item->status == 1)
                                            <span class="badge badge-success">Ativo</span>
                                        @else
                                            <span class="badge badge-warning">Não Ativo</span>
                                        @endif

                                    </td>
                                    <td>{{$item->observation}}</td>
                                    <td>
                                        {{-- BOTÃO PARA EDITAR O REGISTRO --}}
                                        <a href="{{route('patrimony.edit', $item->id)}}" class="btn btn-primary" data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px" data-original-title="Visualizar mais detalhes deste item!">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        {{-- BOTÃO PARA EXCLUIR O REGISTRO --}}
                                        <a id-remove="{{$item->id}}" href="javascript:;" class="remove btn btn-outline-danger btn-danger" data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px" data-original-title="Remover este item!">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <p>Nenhum Patrimônio Cadastrado</p>
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

                            <div class="col-md-12 col-lg-6">
                                <button type="submit" id="destroyMult" class="btn btn-icon icon-left btn-outline-danger btn-danger card-footer-action float-right">
                                    <i class="fas fa-minus-square"></i> Remover Selecionado(s)
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
