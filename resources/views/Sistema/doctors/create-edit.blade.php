@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
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

    {{-- MENSAGENS DE ERRO --}}
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
                    <h4>Gestão de Médicos</h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['doctors.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'doctors.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome</label>
                                {!! Form::text('name', null, ['placeholder' => 'Digite a Nome do médico aqui...', 'class' => "form-control"]) !!}
                                @error('name')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label>CPF</label>
                                {!! Form::number('cpf', null, ['placeholder' => 'Digite o CPF do médico aqui...', 'class' => "form-control"]) !!}
                                @error('cpf')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label>CRM</label>
                                {!! Form::number('crm', null, ['placeholder' => 'Digite o CRM do médico aqui...', 'class' => "form-control"]) !!}
                                @error('crm')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-2">
                                <label>UF</label>
                                {!! Form::text('uf', null, ['placeholder' => 'Digite a silga UF do estado aqui...', 'maxlength' => 2, 'class' => "form-control"]) !!}
                                @error('uf')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Especialidade</label>
                                {!! Form::text('specialty', null, ['placeholder' => 'Digite a especialidade do médico aqui...', 'class' => "form-control"]) !!}
                                @error('specialty')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>PIS/NIS</label>
                                {!! Form::number('pis', null, ['placeholder' => 'Digite o PIS/NIS do médico aqui...', 'class' => "form-control"]) !!}
                                @error('pis')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Telefone</label>
                                {!! Form::number('phone', null, ['placeholder' => 'Digite o telefone do médico aqui...', 'class' => "form-control"]) !!}
                                @error('phone')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                {!! Form::email('email', null, ['placeholder' => 'Digite o email do médico aqui...', 'class' => "form-control"]) !!}
                                @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
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
