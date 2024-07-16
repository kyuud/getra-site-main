@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


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
                    <h4>Gestão de Permissões - <b>{{$data->label ?? 'Nova'}}</b></h4>
                </div>
                <div class="card-body">

                    {!! Form::model($data, ['route' => ['permissions.update.trash', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="form-group">
                            <label>Nome</label>
                            {!! Form::text('name', null, ['placeholder' => 'Digite o nome da permissão aqui...', 'class' => "form-control"]) !!}
                            <span class="text-black-50">Preencha este campo com letras minusculas e com - (traço) no lugar de espaços.</span>
                            @error('name')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Rótulo</label>
                            {!! Form::text('label', null, ['placeholder' => 'Digite o rótulo da permissão aqui...', 'class' => 'form-control']) !!}
                            @error('label')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="card-footer text-right">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary mr-1']) !!}
                            {!! Form::reset('Limpar', ['class' => 'btn btn-secondary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
