@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
@endpush


@section('content')

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
                    <h4>Gestão de Patrimônios</h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['patrimony.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'patrimony.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                    {!! Form::hidden('redirects_to', URL::previous()) !!}

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label>Nome do Produto</label>
                            {!! Form::text('title', null, ['placeholder' => 'Digite o nome do produto aqui...', 'class' => "form-control"]) !!}
                            @error('title')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nota Fiscal</label>
                            {!! Form::number('invoice', null, ['placeholder' => 'Digite o número da nota fiscal aqui...', 'class' => "form-control"]) !!}
                            @error('invoice')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        @if (isset($data))
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de Produto</label>
                                    {!! Form::select('product_id', $patrimonyType, null,
                                    ['placeholder' => 'Selecione o Tipo de Produto...', 'class' => "form-control", "name" => "product_id"])!!}
                                    @error('product_id')
                                    <div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>
                        @else
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo de Produto</label>
                                    {!! Form::select('product_id', $patrimonyType, null,
                                    ['placeholder' => 'Selecione o Tipo de Produto...', 'class' => "form-control", "name" => "product_id"])!!}
                                    @error('product_id')
                                    <div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>
                        @endif

                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Valor </label>
                                {!! Form::number('value', null,
                                ['placeholder' => 'Digite o valor do produto aqui...', 'step' => "0.01", 'class' => "form-control", "id" => "value", "name" => "value"]) !!}
                                @error('value')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <label>Quantidade total de produtos</label>
                            {!! Form::number('amount', null, ['placeholder' => 'Digite a quantidade aqui...', 'class' => "form-control"]) !!}
                            @error('amount')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label>Quantidade um uso</label>
                            {!! Form::number('amount_in_use', null, ['placeholder' => 'Digite a quantidade em uso aqui...', 'class' => "form-control"]) !!}
                            @error('amount_in_use')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    </div>
                    @if( isset($data) )
                        <div class="form-group">
                            <label>Imagem Atual</label>
                            <img class="form-control image-atual" style="width: 500px; height: 100%"
                                 src='{{ url("storage/patrimonies/$data->image_url") }}' alt="{{$data->title}}"/>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Imagem</label>
                        {!! Form::file('image_url', ['class' => 'form-control', 'id'=>'new-image']) !!}
                        @error('image_url')
                        <div class="text-danger">{{ "***$message" }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label>Observação:</label>
                        {!! Form::textarea('observation', null,
                        ['placeholder' => '...', 'class' => "form-control", "name" => "observation"])!!}
                        @error('note')
                        <div class="text-danger">{{ "***$message" }}</div>@enderror
                    </div>

                    <div class="form-group">

                        <label>Status</label>

                        <br style="clear: both"/>


                        @if(isset($data['status']) && $data['status'] == 0)
                            <label class="custom-switch mt-2">
                                {!! Form::checkbox('status', 0, false,
                                    ['class'=>'custom-switch-input',
                                    'id'   =>'status']) !!}
                                <span class="custom-switch-indicator"></span>
                            </label>
                        @else
                            <label class="custom-switch mt-2">
                                {!! Form::checkbox('status', 1, true,
                                    ['class'=>'custom-switch-input',
                                    'id'   =>'status']) !!}
                                <span class="custom-switch-indicator"></span>
                            </label>
                        @endif

                    </div>

                    <div class="card-footer text-right">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary mr-1']) !!}

                        @if( !isset($data) )
                            {!! Form::submit('Salvar & Criar Novo', ['id'=>'save_add', 'class' => 'btn btn-info mr-1']) !!}
                        @endif

                        {!! Form::reset('Limpar', ['class' => 'btn btn-secondary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

