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
                    <h4>Gestão de Endereços</b></h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                    <form action="{{ route('companies.update.trash', $data->id) }}" method="POST" class="form" files="true" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action="{{ route('companies.store') }}" method="POST" class="form" files="true" enctype="multipart/form-data">
                @endif
                        @csrf
                
                        <input type="hidden" name="redirects_to" value="{{ URL::previous() }}">
                
                        <div class="form-group">
                            <label>Rua</label>
                            <input type="text" name="street" placeholder="Digite a rua do endereço aqui..." class="form-control" value="{{ isset($data) ? $data->street : '' }}">
                            @error('street')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        <div class="form-group">
                            <label>Número</label>
                            <input type="text" name="number" placeholder="Digite o número do endereço aqui..." class="form-control" value="{{ isset($data) ? $data->number : '' }}">
                            @error('number')<div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                
                        <!-- Adicione os campos restantes aqui -->
                
                        <div class="form-group">
                            <label>Status</label>
                
                            <br style="clear: both" />
                
                            @if(isset($data['status']) && $data['status'] == 0)
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" value="0" class="custom-switch-input" id="status" {{ isset($data) && $data['status'] == 0 ? 'checked' : '' }}>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            @else
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" value="1" class="custom-switch-input" id="status" {{ !isset($data) || $data['status'] == 1 ? 'checked' : '' }}>
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
