@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra')
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/select2/dist/css/select2.min.css')}}">
@endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')

    <script src="{{url('Painel/light/assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
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
                    <h4>Gestão de Funcionários</h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['employees.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'employees.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nome da empresa</label>
                                {!! Form::select('company_id', $companies, null,
                                ['placeholder' => 'Selecione a empresa', 'class' => "form-control select2", "name" => "company_id"])!!}
                                @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Nome do funcionário</label>
                                {!! Form::text('name', null, ['placeholder' => 'Digite o complemento do funcionário aqui...', 'class' => "form-control currency"])
                                !!}
                                @error('name')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Data de nascimento</label>
                                {!! Form::date('birth', null, ['placeholder' => 'Digite a Data de nascimento aqui...', 'class' => "form-control"])
                                !!}
                                @error('birth')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Idade</label>
                                {!! Form::number('age', null, ['placeholder' => 'Digite a idade do funcionário aqui...', 'class' => "form-control"])
                                !!}
                                @error('age')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>RG</label>
                                {!! Form::text('rg', null, ['placeholder' => 'Digite o rg do funcionário aqui...', 'class' => "form-control"])
                                !!}
                                @error('rg')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>CPF</label>
                                {!! Form::number('cpf', null, ['placeholder' => 'Digite o CPF do funcionário aqui...', 'class' => "form-control"])
                                !!}
                                @error('cpf')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>PIS/NIS</label>
                                {!! Form::number('nis', null, ['placeholder' => 'Digite o PIS/NIS do funcionário aqui...', 'class' => "form-control"]) !!}
                                @error('nis')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Matrícula do empregado para o eSocial</label>
                                {!! Form::number('matricula', null, ['placeholder' => 'Digite a Matrícula do funcionário aqui...', 'class' => "form-control"]) !!}
                                @error('matricula')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Cargo</label>
                                {!! Form::text('occupation', null, ['placeholder' => 'Digite o cargo do funcionário aqui...', 'class' => "form-control"])
                                !!}
                                @error('occupation')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label>Sexo</label>
                                {!! Form::select('sex', ['Feminino', 'Masculino', 'Outro'], null, ['placeholder' => 'Selecione o sexo do cliente aqui...', 'class' => "form-control"])
                                !!}
                                @error('sex')<div class="text-danger">{{ "***$message" }}</div>@enderror
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
