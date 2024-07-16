@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}
@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    <script>
        document.addEventListener('livewire:init', function () {
            window.livewire.on('statusChanged', event => {
                var status = event.detail.status;
                if (!status) {
                    document.getElementById('monthYear').style.display = 'block';
                } else {
                    document.getElementById('inputMonthYear').value = '';
                    document.getElementById('monthYear').style.display = 'none';
                }
            });
        });
    </script>
@endpush

@section('content')

    {{-- MENSAGENS DE SUCESSO --}}
    @if(Session::has('success'))
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

    {{-- MENSAGENS DE ERRO --}}
    @if(isset($errors) && count($errors) > 0)
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
                    <h4>Gestão de Clientes</h4>
                </div>
                <div class="card-body">
                    @livewire('company-management-form', ['companyId' => $data->id ?? null])
                </div>
            </div>
        </div>
    </div>
@endsection
