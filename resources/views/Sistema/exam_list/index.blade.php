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
                    <h4>Lista de Exames</h4>
                </div>
                <div class="card-body">
                    <div class="row col-12 col-md-12 col-lg-12">
                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRAR UM NOVO REGISTRO --}}
                            <a href="{{route('exam_list.create')}}" class="btn btn-icon icon-left btn-success"><i class="fas fa-plus-square"></i> Novo Registro</a>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            <form action="{{ route('exam_list.search') }}" method="POST" class="form form-search form-ds">
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
                                <th style="width:auto;">Nome do exame</th>
                                <th style="width:auto;">Nome do Fornecedor</th>
                                <th style="width:auto;">Valor do exame</th>
                                <th style="width:auto;">Valor a ser cobrado</th>
                                <th style="width:auto;">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                            @forelse($data as $exam)
                                <tr>
                                    <td class="text-center pt-2">
                                        <div class="custom-checkbox custom-control">
                                            <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="{{$exam->id}}" name="ids[]" value="{{$exam->id}}">
                                            <label for="{{$exam->id}}" class="custom-control-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>{{$exam->id}}</td>
                                    <td>{{$exam->name}}</td>
                                    <td>{{$exam->supplier->name}}</td>
                                    <td>{{formatMoney($exam->value_amount)}}</td>
                                    <td>{{formatMoney($exam->value_fee)}}</td>
                                    <td>
                                        <!-- Formulário para deletar o exame -->
                                        <form action="{{ route('exam_list.destroy', $exam->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja deletar este exame?');">
                                                Deletar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                {{-- CASO NÃO HAJA REGISTROS --}}
                                <tr>
                                    <td colspan="8" class="text-center">Nenhum registro encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                    {{-- PAGINAÇÃO DA TABELA --}}
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-6">
                            @if( isset($dataForm) )
                                {!! $data->appends($dataForm)->links() !!}
                            @else
                                {!! $data->links() !!}
                            @endif
                        </div>
                        @can("exam_list-destroyFake")
                            <div class="col-md-12 col-lg-6">
                                <button type="button" id="destroyMult" class="btn btn-icon icon-left btn-outline-danger btn-danger card-footer-action float-right" onclick="yourJavaScriptFunction()">
                                    <i class="fas fa-minus-square"></i> Remover Selecionado(s)
                                </button>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
