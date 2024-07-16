@extends('Sistema.templates.template_01')

<!-- CSS e JS específicos da página -->
@push('css-extra')
    <link rel="stylesheet" href="{{ url('Painel/light/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('Painel/light/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@push('js-extra')
    <script src="{{ url('Painel/light/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('Painel/light/assets/js/page/datatables.js') }}"></script>
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Painel.includes.checkbox')
    @include('Sistema.additionalexams.companies')
@endpush

<!-- Seção de conteúdo da view -->
@section('content')

    <!-- Mensagens de sucesso -->
    @if (Session::has('success'))
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

    <!-- Conteúdo total da página -->
    <div class="row">

        @if (isset($novos) && !empty($novos))

        @endif

        <!-- Adição do formulário para adicionar novos registros -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Exames Adicionais</h4>
                </div>
                <div class="card-body">


                    <!-- {{-- FORMULÁRIO PARA ADICIONAR NOVO REGISTRO --}} -->
                    <form action="{{ route('additionalexams.store') }}" method="POST" class="form">
                        @csrf

                        <div class="form-group">
                            <label for="company_id">Cliente</label>
                            <select name="company_id" class="form-control" required>
                                <option value="" disabled selected>Selecione o cliente</option>
                                @foreach($companies as $companyId => $companyName)
                                    <option value="{{ $companyId }}">{{ $companyName }}</option>
                                @endforeach
                            </select>
                            @error('company_id')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>


                       <div class="row">
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <input type="text" name="cliente" class="form-control" required>
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ</label>
                                    <input type="text" name="cnpj" class="form-control" required>
                                </div>
                            </div>
                        </div> 


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente">Nome do funcionário</label>
                                    <input type="text" name="cliente" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome_exame">Nome do Exame</label>
                                    <input type="text" name="nome_exame" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="valor_exame">Valor do Exame</label>
                                    <input type="text" name="valor_exame" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data_exame">Data do Exame</label>
                                    <input type="text" name="data_exame" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="data_exame">Fornecedor</label>
                                    <input type="text" name="data_exame" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Adicionar Registro</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
