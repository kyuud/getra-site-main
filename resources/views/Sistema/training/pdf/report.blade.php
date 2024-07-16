@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush


@section('content')

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}

    <h5>Relatório de Treinamento por Empresa</h5>

    <div class="row" style="margin-bottom: -150px">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="card-body">

                        @forelse($data as $item)

                            <div class="row">
                                <div class="col-md-6" style="width: 45%">
                                    <div class="form-group">
                                        <label><b>Nome da empresa</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{$item->company->name}}</div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="width: 45%; float: right">
                                    <div class="form-group">
                                        <label><b>CNPJ da empresa</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{formatCnpjCpf($item->company->cnpj)}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="">
                                <div class="col-md-6" style="width: 45%;">
                                    <div class="form-group">
                                        <label><b>Treinamento</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{$item->treinamento}}</div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="width: 45%; float: right">
                                    <div class="form-group">
                                        <label><b>Tipo</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{$item->tipo}}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row" style="">
                                <div class="col-md-6" style="width: 45%;">
                                    <div class="form-group">
                                        <label><b>Início do contrato</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{ formatDate($item->start, 'd/m/Y')}}</div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="width: 45%; float: right">
                                    <div class="form-group">
                                        <label><b>Quantidade de funcionários</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{$item->qtd}}</div>
                                    </div>
                                </div>
                            </div>


                            <div class="row" style="">
                                <div class="col-md-6" style="width: 45%;">
                                    <div class="form-group">
                                        <label><b>Prazo</b></label>
                                        <div style="background: #efeeee; border-radius: 5px; padding: 5px; margin-top: -5px; color: #343232">{{$item->deadline}} (meses)</div>
                                    </div>
                                </div>

                                <div class="col-md-6" style="width: 45%; float: right">
                                    <div class="form-group">
                                        <label><b>Concluído?</b></label>
                                        <br />
                                        @if($item->status == 1)
                                            <span class="badge badge-success">Sim</span>
                                        @else
                                            <span class="badge badge-warning">Não</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        @empty

                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>

    <br style="clear: both">

@endsection

