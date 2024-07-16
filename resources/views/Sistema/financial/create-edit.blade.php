@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Painel.includes.checkbox')
    @include('Sistema.financial.companies')
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
                                        <h4>Financeiro</h4>
                                    </div>
                                    <div class="card-body">

                                        @if( isset($data) )
                                            <form action="{{ route('financial.update', $data->id) }}" method="POST" class="form" enctype="multipart/form-data">
                                                @method('PUT')
                                        @else
                                            <form action="{{ route('financial.store') }}" method="POST" id="formStore" class="form" enctype="multipart/form-data">
                                        @endif

                                            @csrf
                                            <input type="hidden" name="redirects_to" value="{{ URL::previous() }}">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nome da empresa</label>
                                                        <select name="company_id" placeholder="Selecione a empresa" class="form-control" required>
                                                            <option value="" disabled selected>Selecione a empresa</option>
                                                            @foreach($companies as $companyId => $companyName)
                                                                <option value="{{ $companyId }}" @if(isset($data) && $data->company_id == $companyId) selected @endif>{{ $companyName }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>

                                                @if (isset($data))
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>CNPJ</label>
                                                            <input type="text" name="cnpj" value="{{ $data->company->cnpj }}" readonly class="form-control">
                                                            @error('cnpj')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>CNPJ</label>
                                                            <input type="text" name="cnpj" value="{{ old('cnpj') }}" readonly class="form-control">
                                                            @error('cnpj')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Cidade</label>
                                                        <input type="text" name="city" value="{{ old('city') }}" placeholder="Digite a cidade aqui..." class="form-control currency" required>
                                                        @error('city')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>E-mail</label>
                                                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Digite o email aqui..." class="form-control" required>
                                                        @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Data de vencimento</label>
                                                        <input type="date" name="duedate" value="{{ old('duedate') }}" placeholder="Digite a Data de nascimento aqui..." class="form-control" required>
                                                        @error('duedate')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> Descontos </label>
                                                        <input type="number" name="discounts" value="{{ old('discounts') }}" placeholder="..." class="form-control" id="discounts" required>
                                                        <span><i>Use o ponto ( . ) no lugar da virgula ( , )</i></span>
                                                        @error('discounts')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Observações</label>
                                                        <input type="text" name="obs" value="{{ old('obs') }}" placeholder="..." class="form-control currency" required>
                                                        @error('obs')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Concluído (Sim/Não)</label>
                                                        <br style="clear: both" />
                                                        <label class="custom-switch mt-2">
                                                            <input type="checkbox" name="status" value="1" class="custom-switch-input" id="status" @if(isset($data['status']) && $data['status'] == 1) checked @endif>
                                                            <span class="custom-switch-indicator"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> Honorários </label>
                                                        <input type="number" name="fees" value="{{ old('fees') }}" placeholder="" class="form-control" readonly id="value" required>
                                                        @error('fees')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label> Quantidade de funcionários </label>
                                                        <input type="number" name="qtd" value="{{ old('qtd') }}" placeholder="..." class="form-control" id="qtd" onblur="calcValue()" required>
                                                        @error('qtd')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group" id="anyValue">
                                                        <!-- Adicione aqui os campos correspondentes ao Valor por Vida ou Valor Avulso -->
                                                        <label> Valor por vida </label>
                                                        <input name="lifevalue" id="lifevalue" class="form-control myvalue" required>
                                                        <span><i>Use o ponto ( . ) no lugar da virgula ( , )</i></span>
                                                        @error('lifevalue')<div class="text-danger">{{ $message }}</div>@enderror
                                                    </div>
                                                </div>

                                            <div class="card-footer text-right">
                                                <button type="submit" class="btn btn-primary mr-1">Salvar</button>

                                                @if( !isset($data) )
                                                    <button type="submit" id="save_add" class="btn btn-info mr-1">Salvar & Criar Novo</button>
                                                @endif

                                                <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
                                            </div>

                                        </form>


                </div>
            </div>
        </div>
    </div>

@endsection
