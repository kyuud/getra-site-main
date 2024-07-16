@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra')
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/select2/dist/css/select2.min.css')}}">
@endpush

@push('js-extra')
    <script src="{{url('Painel/light/assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
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
                    <h4>Gestão de Permissões a Papeis - <b>{{$data->id ?? 'Nova'}}</b></h4>
                </div>
                <div class="card-body">

                    {!! Form::model($data, ['route' => ['permissions-roles.update.trash', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="form-group">
                            <label>Permissão</label>
                            {!! Form::select('permission_id', $permissions, null,
                                ['placeholder' => 'Escolha uma permissão...', 'class' => "form-control select2"])
                            !!}
                            @error('permission_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Papel</label>
                            {!! Form::select('role_id', $roles, null, ['placeholder' => 'Escolha um papel...', 'class' => "form-control select2"]) !!}
                            @error('role_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
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
