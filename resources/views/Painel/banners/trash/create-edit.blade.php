@extends('Painel.templates.template_01')

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
                    <h4>Gestão de Banners - <b>{{$data->title ?? 'Novo'}}</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                    <form action="{{ route('banners.update.trash', $data->id) }}" method="POST" class="form" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="{{ route('banners.store') }}" method="POST" class="form" enctype="multipart/form-data">
                @endif
                        @csrf
                
                        <input type="hidden" name="redirects_to" value="{{ URL::previous() }}">
                
                        <div class="form-group">
                            <label for="title">Título</label>
                            <input type="text" name="title" placeholder="Digite o título do banner aqui..." class="form-control" value="{{ isset($data) ? $data->title : '' }}">
                            @error('title')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        <div class="form-group">
                            <label for="position">Posição</label>
                            <input type="text" name="position" placeholder="Digite a posição do banner aqui..." class="form-control" value="{{ isset($data) ? $data->position : '' }}">
                            @error('position')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="text" name="url" placeholder="Digite a url do banner aqui..." class="form-control" value="{{ isset($data) ? $data->url : '' }}">
                            @error('url')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea name="description" placeholder="Digite a descrição do banner aqui..." class="form-control">{{ isset($data) ? $data->description : '' }}</textarea>
                            @error('description')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        @if( isset($data) )
                            <div class="form-group">
                                <label for="image">Imagem Atual</label>
                                <img class="form-control image-atual" style="width: 100%; height: 100%" src='{{ url("uploads/banners/$data->image") }}' />
                            </div>
                        @endif
                
                        <div class="form-group">
                            <label for="image">Imagem</label>
                            <input type="file" name="image" class="form-control" id="new-image">
                            @error('image')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        <div class="form-group">
                            <label>Status</label>
                
                            <br style="clear: both" />
                
                            @if(isset($data['status']) && $data['status'] == 0)
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" id="status" value="0">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            @else
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" id="status" value="1" checked>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            @endif
                        </div>
                
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary mr-1">Salvar</button>
                            <button type="reset" class="btn btn-secondary">Limpar</button>
                        </div>
                    </form>
                
                </div>
            </div>
        </div>
    </div>

@endsection
