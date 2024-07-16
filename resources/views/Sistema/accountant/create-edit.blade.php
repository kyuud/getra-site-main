@extends('Painel.templates.template_01')

{{-- PARA INCLUIR CSS ESPECÍFICOS DA PÁGINA --}}
@push('css-extra')
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
@endpush

{{-- PARA INCLUIR JS ESPECÍFICOS DA PÁGINA --}}
@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Painel.includes.checkbox')
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

            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Gestão de Contadores</h4>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA VOLTAR UMA PÁGINA --}}
                            <a class="btn btn-primary" style="cursor:pointer; color: #fff" href="{{ URL::previous() }}">
                                Voltar
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    
                    @livewire('accountant-form')
                   
                </div>
            </div>
        </div>
    </div>

@endsection
