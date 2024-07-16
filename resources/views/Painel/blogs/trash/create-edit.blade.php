@extends('Painel.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') 
    {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet"> --}}
@endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.summernote')
    <script src="{{ url('Painel\light\assets\js\summernote.min.js') }}"></script>
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
                    <h4>Gestão de Blogs - <b>{{$data->title ?? 'Novo'}}</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['blogs.update.trash', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'blogs.store', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="form-group">
                            <label>Título</label>
                            {!! Form::text('title', null, ['placeholder' => 'Digite o título do blog aqui...', 'class' => "form-control"]) !!}
                            @error('title')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Fonte</label>
                            {!! Form::text('abstract', null, ['placeholder' => 'Fonte', 'class' => 'form-control']) !!}
                            @error('abstract')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Resumo</label>
                            {!! Form::textarea('highlights', null, ['placeholder' => 'Digite o resumo do blog aqui...', 'class' => 'form-control summernote']) !!}
                            @error('highlights')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="form-group">
                            <label>Texto</label>
                            {!! Form::textarea('description', null, ['placeholder' => 'Digite a testo do blog aqui...', 'class' => 'form-control summernote']) !!}
                            @error('description')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        @if( isset($data) )
                            <div class="form-group">
                                <label>Imagem Atual</label>
                                <img class="form-control image-atual" style="width: 100%; height: 100%"
                                    src='{{ url("uploads/blogs/$data->image") }}' />
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Imagem</label>
                            {!! Form::file('image', ['class' => 'form-control', 'id'=>'new-image']) !!}
                            @error('image')<div class="text-danger">{{ "***$message" }}</div>@enderror
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
                            {!! Form::reset('Limpar', ['class' => 'btn btn-secondary']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
