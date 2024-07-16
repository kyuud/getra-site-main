@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Sistema.appraisal.companies')
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
                    <h4>Laudos</h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['appraisal.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'appraisal.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome da empresa</label>
                                    {!! Form::select('company_id', $companies, null,
                                    ['placeholder' => 'Selecione a empresa', 'class' => "form-control", "name" => "company_id"])!!}
                                    @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            @if (isset($data))
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CNPJ</label>
                                        {!! Form::text('cnpj', $data->company->cnpj,
                                        ['readonly' => '...', 'class' => "form-control", "name" => "cnpj"])!!}
                                        @error('cnpj')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>CNPJ</label>
                                        {!! Form::text('cnpj', null,
                                        ['readonly' => '...', 'class' => "form-control", "name" => "cnpj"])!!}
                                        @error('cnpj')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div> 
                            @endif

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Inicio do contrato</label>
                                    {!! Form::date('start', null, ['placeholder' => 'Digite a Data de nascimento aqui...', 'class' => "form-control"])
                                    !!}
                                    @error('start')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label> Titulo </label>
                                        {!! Form::text('titulo', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "titulo"]) !!}
                                        @error('titulo')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Vigência</label>
                                    {!! Form::date('validity', null, ['placeholder' => 'Digite a Data de nascimento aqui...', 'class' => "form-control"])
                                    !!}
                                    @error('validity')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label> Prazo </label>
                                        {!! Form::number('deadline', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "deadline"]) !!}
                                        @error('deadline')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label> (Meses) </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Concluído (Sim/Não)</label>
                                    <br style="clear: both" />
                                    @if(isset($data['status']) && $data['status'] == 1)
                                        <label class="custom-switch mt-2">
                                            {!! Form::checkbox('status', 1, true,
                                                ['class'=>'custom-switch-input',
                                                'id'   =>'status']) !!}
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    @else
                                        <label class="custom-switch mt-2">
                                            {!! Form::checkbox('status', 0, false,
                                                ['class'=>'custom-switch-input',
                                                'id'   =>'status']) !!}
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary mr-1']) !!}

                            @if( !isset($data) )
                                {!! Form::submit('Salvar & Criar Novo', ['id'=>'save_add', 'class' => 'btn btn-info mr-1']) !!}
                            @endif

                            <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
