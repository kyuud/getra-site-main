@extends('Painel.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') 
    {{-- <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet"> --}}
@endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Painel.includes.summernote')
    <script src="{{ url('Painel\light\assets\js\summernote.min.js') }}"></script>
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
                    <h4>Gestão de Blogs - <b>{{$data->title ?? 'Novo'}}</b></h4>
                </div>
                <div class="card-body">

                    <form action="{{ isset($data) ? route('blogs.update', $data->id) : route('blogs.store') }}" method="POST"
                        class="form" id="{{ isset($data) ? 'formUpdate' : 'formStore' }}" enctype="multipart/form-data">
                        @if(isset($data))
                        @method('PUT')
                        @endif
                        @csrf
                    
                        <input type="hidden" name="redirects_to" value="{{ URL::previous() }}">
                    
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" value="{{ isset($data) ? $data->title : '' }}"
                                placeholder="Digite o título do blog aqui..." class="form-control">
                            @error('title')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Fonte</label>
                            <input type="text" name="abstract" value="{{ isset($data) ? $data->abstract : '' }}" placeholder="Fonte"
                                class="form-control">
                            @error('abstract')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Resumo</label>
                            <textarea name="highlights" placeholder="Digite o resumo do blog aqui..."
                                class="form-control summernote">{{ isset($data) ? $data->highlights : '' }}</textarea>
                            @error('highlights')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Texto</label>
                            <textarea name="description" placeholder="Digite a texto do blog aqui..."
                                class="form-control summernote">{{ isset($data) ? $data->description : '' }}</textarea>
                            @error('description')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        @if(isset($data))
                        <div class="form-group">
                            <label>Imagem Atual</label>
                            <img class="form-control image-atual" style="width: 100%; height: 100%"
                                src='{{ url("uploads/blogs/$data->image") }}' />
                        </div>
                        @endif
                    
                        <div class="form-group">
                            <label>Imagem</label>
                            <input type="file" name="image" class="form-control" id="new-image">
                            @error('image')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    
                        <div class="form-group">
                            <label>Status</label>
                            <br style="clear: both" />
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="status" value="1"
                                    {{ isset($data['status']) && $data['status'] == 1 ? 'checked' : '' }} class="custom-switch-input"
                                    id="status">
                                <span class="custom-switch-indicator"></span>
                            </label>
                        </div>
                    
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary mr-1">Salvar</button>
                    
                            @if(!isset($data))
                            <button type="submit" id="save_add" class="btn btn-info mr-1">Salvar & Criar Novo</button>
                            @endif
                    
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

@endsection
