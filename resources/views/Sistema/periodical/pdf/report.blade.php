@extends('Painel.templates.template_02')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra') @endpush

@section('content')

<style>
    tr {
    line-height: 1px;
    min-height: 1px;
    }
    
</style>

    {{-- CONTEÚDO TOTAL DA PÁGINA --}}
    <div>
        <div style="text-align: center; font-size: 8px; margin-top: -20px;">
            <img style="max-width: 100px; margin-top: -15px; float: left;" src="{{url('Site/images/logonova-getra.png')}}" alt="logo">
            Rua José Elpídio da Costa Monteiro, 92, São José - Campina Grande - PB
            - Contatos: (83) 3201-1446 / (83) 99988-1495 E-mail: getra@getra.com.br
        </div>
    </div>
    

    <div style="font-size: 8px">

    <h6 style="text-align: center; font-size: 8px;"> PERIÓDICO / MUDANÇA DE FUNÇÃO </h6>

    {{-- INÍCIO DA TABELA--}}
    <table class="table table-bordered" style="background-color: #fff">
        <tbody>
            <tr>
                <th scope="row" style="width: 20%">EMPRESA</th>
                <td colspan="3" style="text-transform: uppercase"> {{ $data['company_name'] }} </td>
            </tr>
            <tr>
                <th scope="row" style="width: 20%">FUNCIONÁRIO</th>
                <td colspan="3" style="text-transform: uppercase"> {{ $data['name'] }} </td>
            </tr>
            <tr>
                <th scope="row" style="width: 20%">CARGO</th>
                <td style="text-transform: uppercase">{{ $data['occupation'] }}</td>
                <th style="width:25%">SEXO</th>
                <td style="width:25%; text-transform: uppercase;"> {{ $data['sex'] }}</td>
            </tr>
            <tr>
                <th scope="row" style="width: 20%">NASCIMENTO</th>
                <td>{{ date('d/m/Y', strtotime($data['birth'])) }}</td>
                <th style="width:25%">IDADE </th>
                <td style="width:25%"> {{ $data['age'] }}</td>
            </tr>
            <tr>
                <th scope="row" style="width: 20%">RG</th>
                <td>{{ $data['rg'] }}</td>
                <th style="width:25%">CPF</th>
                <td style="width:25%">{{ $data['cpf'] }}</td>
            </tr>
        </tbody>
    </table>
    {{-- INÍCIO DA TABELA--}}

    {{-- INÍCIO DA TABELA--}}
    <table class="table table-bordered" style="background-color: #fff">
        <thead>
            <th colspan="3">1 - Tipo de Exame</th>
        </thead>
        <td style="width:50%">
            @if( isset($data['exam1'] )  &&  $data['exam1'] == 'periodical')
                <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Periódico</label>
            @else
                <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Periódico</label>
            @endif
            @if( isset($data['exam1'] )  &&  $data['exam1'] == 'change')
                <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Mudança de Função </label>
            @else
                <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Mudança de Função </label>
            @endif
            </td>
    </table>
    {{-- FINAL DA TABLEA--}}

    {{-- INÍCIO DA TABELA--}}
    <table class="table table-bordered" style="background-color: #fff">
        <thead>
        <tr>
            <th colspan="4">2 - Avaliação Clínica</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">Faz uso de medicação atualmente?</td>
                    <td style="width:50%">
                        @if( isset($data['clinic1'] )  &&  $data['clinic1'] == 'Não')
                            <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['clinic1'] )  &&  $data['clinic1'] == 'Sim')
                            <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </td>
            </tr>
            <tr>
                <td colspan="3">Se sim, qual (is)?</td>
                <td style="width:50%">
                    {{ $data['clinic2'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Tem alguma queixa no momento?</td>
                <td style="width:50%">
                    @if( isset($data['clinic3'] )  &&  $data['clinic3'] == 'Não')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Não</label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Não</label>
                    @endif
                    @if( isset($data['clinic3'] )  &&  $data['clinic3'] == 'Sim')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Sim </label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Sim </label>
                    @endif                   
                </td>
            </tr>
            <tr>
                <td colspan="3">Se sim, qual (is)?</td>
                <td style="width:50%">
                    {{ $data['clinic4'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Faz algum tratamento não medicamentoso? </td>
                <td style="width:50%">
                    @if( isset($data['clinic5'] )  &&  $data['clinic5'] == 'Não')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Não</label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Não</label>
                    @endif
                    @if( isset($data['clinic5'] )  &&  $data['clinic5'] == 'Sim')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Sim </label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Sim </label>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">Se sim, qual (is)?</td>
                <td style="width:50%">
                    {{ $data['clinic6'] }}
                </td>
            </tr>
        </tbody>
    </table>
    {{-- FINAL DA TABLEA--}}

    {{-- INÍCIO DA TABELA--}}
    <table class="table table-bordered" style="background-color: #fff">
        <thead>
        <tr>
            <th colspan="4">3 - Exames Físicos</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">Cabeça e pescoço</td>
                <td style="width:50%">
                    {{ $data['fisic1'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Cardio Vascular</td>
                <td style="width:50%">
                    {{ $data['fisic2'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Respiratório</td>
                <td style="width:50%">
                    {{ $data['fisic3'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Abdome</td>
                <td style="width:50%">
                    {{ $data['fisic4'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Osteomuscular</td>
                <td style="width:50%">
                    {{ $data['fisic5'] }}
                    
                </td>
            </tr>
            <tr>
                <td colspan="3">Neurológico</td>
                <td style="width:50%">
                    {{ $data['fisic6'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Mais informações que julgar necessário</td>
                <td style="width:50%">
                    {{ $data['fisic7'] }}
                </td>
            </tr>
        </tbody>
    </table>
    {{-- FINAL DA TABLEA--}}

    {{-- INÍCIO DA TABELA--}}
    <table class="table table-bordered" style="background-color: #fff">
        <thead>
        <tr>
            <th colspan="4">4 - Conclusão</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">Orientação</td>
                <td style="width:50%">
                    {{ $data['orientation'] }}
                </td>
            </tr>
            <tr>
                <td colspan="3">Resultado</td>
                <td style="width:50%">
                    @if( isset($data['result'] )  &&  $data['result'] == 'Normal')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Normal</label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Normal</label>
                    @endif
                    @if( isset($data['result'] )  &&  $data['result'] == 'Anormal')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Anormal </label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Anormal </label>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="3">Clinicamente liberado para o setor e cargo?</td>
                <td style="width:50%">
                    @if( isset($data['release'] )  &&  $data['release'] == 'Não')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Não</label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Não</label>
                    @endif
                    @if( isset($data['release'] )  &&  $data['release'] == 'Sim')
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' checked/> Sim </label>
                    @else
                        <label  style='width: 25%; display: inline;'> <input type= 'radio' /> Sim </label>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    {{-- FINAL DA TABLEA--}}

    {{-- INÍCIO DA TABELA--}}
    <table class="table table-bordered" style="background-color: #fff">
        <thead>
        <tr>
            <th class="col-12">Observação:</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td class="col-12">
                    {{ $data['observation'] }}
                </td>
            </tr>
        </tbody>
    </table>
    {{-- FINAL DA TABLEA--}}
    
    <h6 style="width: 100%; font-size: 8px;">Campina Grande - PB, </h6>
    <br>
    <br>

    <div class="col-12">
        <label style="width: 50%; text-align: center"> <hr style="width: 50%">  Médico (a)  Executor </label>
        <label style="width: 50%; text-align: center"> <hr style="width: 50%"> Colaborador           </label>

        <div style="text-align: center">Obs.: 1ª Via: Empresa; 2ª Via: Empregado; 3ª Via: Prontuário</div>
    </div>

</div>

{{-- CONTEÚDO TOTAL DA PÁGINA --}}

@endsection

