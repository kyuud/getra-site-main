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
                    <h4>Banners Cadastrados</h4>
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
                            <form action="{{ route('banners.search.trash') }}" method="POST" class="form form-search form-ds">
                                @csrf
                            
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

                    <br style="clear: both" />

                    {{-- FORMULÁRIO NA TABELA PARA EXCLUIR SELECIONADOS --}}
                    <form action="{{ route('banners.destroyMultWithAjax') }}" method="POST" id="formDestroyMult">
                        @csrf
                    
                        <!-- TABELA PARA EXIBIÇÃO DOS REGISTROS -->
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
                                    <th>Imagem</th>
                                    <th>Título</th>
                                    <th>Posição</th>
                                    <th style="width:15%">Url</th>
                                    <th style="width:25%">Descrição</th>
                                    <th>Status</th>
                                    <th>Cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                    
                                <!-- LISTANDO REGISTROS DINAMICAMENTE -->
                                @forelse($data as $banner)
                                <tr>
                                    <td class="text-center pt-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                                id="{{$banner->title}}" name="ids[]" value="{{$banner->id}}">
                                            <label for="{{$banner->title}}" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                    
                                    <td>
                                        <img alt="{{$banner->title}}"
                                            style="max-width: 10em; -webkit-box-shadow: 0 2px 10px 0 rgba(105,103,103,0.5);
                                                        box-shadow: 0 5px 15px 0 rgba(105,103,103,0.5);
                                                        border: none; border-radius: unset;"
                                            src='{{ url("uploads/banners/$banner->image") }}' />
                    
                                    </td>
                                    <td>{{$banner->title}}</td>
                                    <td>{{$banner->position}}</td>
                                    <td>{{$banner->url}}</td>
                                    <td>{{$banner->description}}</td>
                                    <td>
                                        @if($banner->status == 1)
                                        <span class="badge badge-success">Ativo</span>
                                        @else
                                        <span class="badge badge-warning">Inativo</span>
                                        @endif
                    
                                    </td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($banner['created_at'])) }}</td>
                                    <td>
                                        <!-- BOTÃO PARA EDITAR O REGISTRO -->
                                        <a href="{{route('banners.edit.trash', $banner->id)}}" class="btn btn-primary"
                                            data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                            data-original-title="Visualizar mais detalhes deste item!">
                                            <i class="fas fa-eye"></i>
                                        </a>
                    
                                        <!-- BOTÃO PARA RESTAURAR O REGISTRO -->
                                        <a id-restore="{{$banner->id}}" href="javascript:;" class="restore btn btn-outline-info btn-info"
                                            data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                            data-original-title="Restaurar este item!">
                                            <i class="fas fa-undo"></i>
                                        </a>
                    
                                        <!-- BOTÃO PARA EXCLUIR O REGISTRO -->
                                        <a id-remove="{{$banner->id}}" href="javascript:;" class="remove_force btn btn-outline-danger btn-dark"
                                            data-toggle="tooltip" style="min-width:43px; margin-bottom: 5px"
                                            data-original-title="Remover permanentemente este item!">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                    
                                @empty
                                <tr>
                                    <p>Lixeira de Banners Vazia</p>
                                </tr>
                                @endforelse
                    
                            </tbody>
                        </table>
                    
                        <!-- INFORMAÇÕES DOS REGISTROS POR PÁGINA E TOTAL -->
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
                    
                        <!-- PAGINAÇÃO DA TABELA -->
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6">
                                @if( isset($dataForm) )
                                {!! $data->appends($dataForm)->links() !!}
                                @else
                                {!! $data->links() !!}
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <button type="button" id="destroyMultForce"
                                    class="btn btn-icon icon-left btn-outline-dark btn-dark card-footer-action float-right">
                                    <i class="fas fa-minus-square"></i> Remover Selecionado(s)
                                </button>
                    

                </div>
            </div>
        </div>
    </div>

@endsection
