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
                    <h4>Gestão de Funcionários</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['employees.update.trash', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'employees.store', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="form-group">
                            <label>Nome da empresa</label>
                            {!! Form::select('company_id', $companies, null,
                            ['placeholder' => 'Selecione a empresa', 'class' => "form-control", "name" => "company_id"])!!}
                            @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Nome do funcionário</label>
                            {!! Form::text('name', null, ['placeholder' => 'Digite o complemento do funcionário aqui...', 'class' => "form-control"])
                            !!}
                            @error('name')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Cargo</label>
                            {!! Form::text('occupation', null, ['placeholder' => 'Digite o cargo do funcionário aqui...', 'class' => "form-control"])
                            !!}
                            @error('occupation')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Idade</label>
                            {!! Form::number('age', null, ['placeholder' => 'Digite a idade do funcionário aqui...', 'class' => "form-control"])
                            !!}
                            @error('age')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>RG</label>
                            {!! Form::number('rg', null, ['placeholder' => 'Digite o rg do funcionário aqui...', 'class' => "form-control"])
                            !!}
                            @error('rg')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>CPF</label>
                            {!! Form::number('cpf', null, ['placeholder' => 'Digite o CPF do funcionário aqui...', 'class' => "form-control"])
                            !!}
                            @error('cpf')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Sexo</label>
                            {!! Form::text('sex', null, ['placeholder' => 'Digite o telefone do cliente aqui...', 'class' => "form-control"])
                            !!}
                            @error('sex')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Data de nascimento</label>
                            {!! Form::date('birth', null, ['placeholder' => 'Digite a Data de nascimento aqui...', 'class' => "form-control"])
                            !!}
                            @error('birth')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">

                            <label>Status</label>

                            <br style="clear: both" />

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
                            <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
