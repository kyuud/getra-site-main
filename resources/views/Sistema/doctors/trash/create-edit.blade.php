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
                    <h4>Gestão de Endereços</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['doctors.update.trash', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'doctors.store', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="form-group">
                            <label>Nome</label>
                            {!! Form::text('name', null, ['placeholder' => 'Digite o nome do médico aqui...', 'class' => "form-control"]) !!}
                            @error('name')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>CRM</label>
                            {!! Form::text('crm', null, ['placeholder' => 'Digite o CRM do médico aqui...', 'class' => "form-control"]) !!}
                            @error('crm')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Especialidade</label>
                            {!! Form::text('specialty', null, ['placeholder' => 'Digite a especialidade do médico aqui...', 'class' => "form-control"]) !!}
                            @error('specialty')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Telefone</label>
                            {!! Form::text('phone', null, ['placeholder' => 'Digite o telefone do médico aqui...', 'class' => "form-control"]) !!}
                            @error('phone')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::text('email', null, ['placeholder' => 'Digite o email do médico aqui...', 'class' => "form-control"]) !!}
                            @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
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
