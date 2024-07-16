@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra')
    <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/select2/dist/css/select2.min.css')}}">
@endpush

@push('js-extra')
    <script src="{{url('Painel/light/assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
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
                    <h4>Gestão de Permissões a Papeis - <b>{{$roleEdit->label ?? 'Nova'}}</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['permissions-roles.update', $id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'permissions-roles.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        {!! Form::hidden('role_id', $id) !!}

                        <label>Permissões</label>
                        <div class="row form-group">

                            @forelse($permissions as $key => $permission)

                                @php $i = false; @endphp

                                @php if(isset($data)) if(in_array($key, $data)) $i = true; @endphp

                                <div class="form-group col-12 col-md-6 col-lg-3">

                                    <label class="custom-switch mt-2" style="padding-left:0px">
                                        {!! Form::checkbox('permission_id[]', $key , $i,
                                            ['class'=>'custom-switch-input',
                                             'id'   =>"permission_id-$key"]) !!}
                                        <span class="custom-switch-indicator"></span>
                                    </label>

                                    &nbsp;
                                <span>{{$key . " - " . $permission}}</span>
                            </div>


                            @empty
                                <span>Sem Permissões para escolher!</span>
                            @endforelse

                            @error('permission_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        @if( !isset($data) )

                            <div class="form-group">
                                <label>Papel</label>
                                {!! Form::select('role_id', $roles, null, ['placeholder' => 'Escolha um papel...', 'class' => "select2 form-control"]) !!}
                                @error('role_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>

                        @endif


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
