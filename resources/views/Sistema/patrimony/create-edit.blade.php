@extends('Painel.templates.template_01')

{{-- PARA INCLUIR CSS ESPECÍFICOS DA PÁGINA --}}
@push('css-extra')
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endpush

{{-- PARA INCLUIR JS ESPECÍFICOS DA PÁGINA --}}
@push('js-extra')
    <script src="{{ url('Painel/light/assets/js/summernote.min.js') }}"></script>
    <script src="{{ url('Painel/light/assets/js/includes/image.js') }}"></script>
    <script src="{{ url('Painel/light/assets/js/includes/save.js') }}"></script>
    <script src="{{ url('Painel/light/assets/js/includes/checkbox.js') }}"></script>
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

    @if( isset($errors) && count($errors) > 0 )
        <div class="alert alert-warning alert-dismissible show fade">
            <div class="alert-title alert-ico">
                <i class="far fa-lightbulb"></i> Atenção
            </div>
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>×</span>
                </button>
                Confira os campos do formulário!
                {{--@foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach--}}
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestão de Patrimônios - <b>{{$data->title ?? 'Novo'}}</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        <form action="{{ route('patrimony.update', $data->id) }}" method="POST" class="form" enctype="multipart/form-data">
                            @method('PUT')
                    @else
                        <form action="{{ route('patrimony.store') }}" method="POST" id="formStore" class="form" enctype="multipart/form-data">
                    @endif

                    @csrf
                    <input type="hidden" name="redirects_to" value="{{ URL::previous() }}">

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nome do Produto</label>
                            <input type="text" name="title" placeholder="Digite o nome do produto aqui..." class="form-control" value="{{ isset($data) ? $data->title : '' }}">
                            @error('title')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nota Fiscal</label>
                            <input type="number" name="invoice" placeholder="Digite o número da nota fiscal aqui..." class="form-control" value="{{ isset($data) ? $data->invoice : '' }}">
                            @error('invoice')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tipo de Produto</label>
                                <select name="product_id" class="form-control">
                                    <option value="" disabled selected>Selecione o Tipo de Produto...</option>
                                    @foreach($patrimonyType as $type)
                                        <option value="{{ $type->id }}" {{ isset($data) && $data->product_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> Valor </label>
                                <input type="number" name="value" placeholder="Digite o valor do produto aqui..." step="0.01" class="form-control" id="value" value="{{ isset($data) ? $data->value : '' }}">
                                @error('value')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label>Quantidade total de produtos</label>
                            <input type="number" name="amount" placeholder="Digite a quantidade aqui..." class="form-control" value="{{ isset($data) ? $data->amount : '' }}">
                            @error('amount')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    </div>

                    @if( isset($data) )
                        <div class="form-group">
                            <label>Imagem Atual</label>
                            <img class="form-control image-atual" style="width: 500px; height: 100%" src='{{ url("storage/patrimonies/$data->image_url") }}' alt="{{$data->title}}"/>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="image_url" class="form-control" id="new-image">
                        @error('image_url')
                        <div class="text-danger">{{ "***$message" }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Observação:</label>
                        <textarea name="observation" placeholder="..." class="form-control">{{ isset($data) ? $data->observation : '' }}</textarea>
                        @error('note')
                        <div class="text-danger">{{ "***$message" }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <br style="clear: both"/>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="status" class="custom-switch-input" id="status" {{ isset($data) && $data['status'] == 1 ? 'checked' : '' }}>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary mr-1">Salvar</button>
                        @if( !isset($data) )
                            <button type="submit" id="save_add" class="btn btn-info mr-1">Salvar & Criar Novo</button>
                        @endif
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
