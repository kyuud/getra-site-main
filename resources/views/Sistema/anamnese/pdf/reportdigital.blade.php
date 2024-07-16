<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Anamnse</title>

        {{-- ARQUIVOS CSS GERAIS --}}
        <link rel="stylesheet" href="Site/css/bootstrap.min.css">

    </head>
    <body style="font-size: 9pt">
        <div>
            <img src="Painel/light/assets/img/logo.png" style="width: 200px"/>
        </div>

        <div style="position: absolute; top: 10px; margin-left: 200px">
            <p style="text-align: center; font-size: 10pt">
                Rua José Elpídio da Costa Monteiro, Nº 92, São José - Campina Grande - PB <br />
                Contatos: (83) 3201-1446 / (83) 99988-1495 - E-mail: getra@getra.com.br
            </p>
        </div>

        <hr style="margin-top: -10px" />

        <div>
            <h6 style="text-align: center; margin-top: -10px">ANAMNESE</h6>
        </div>

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; font-size: 9px; border: 1px solid #000!important">
            <tbody>
                <tr>
                    <td scope="row" style="width: 20%"><b>Empresa</b></td>
                    <td colspan="3" style="text-transform: uppercase"> {{ $data['company_name'] }} </td>
                </tr>
                <tr>
                    <td scope="row" style="width: 20%"><b>Funcionário</b></td>
                    <td colspan="3" style="text-transform: uppercase"> {{ $data['name'] }} </td>
                </tr>
                <tr>
                    <td scope="row" style="width: 20%"><b>Cargo</b></td>
                    <td style="text-transform: uppercase; width:30%">{{ $data['occupation'] }}</td>
                    <td style="width:25%"><b>Sexo</b></td>
                    <td style="width:25%; text-transform: uppercase"> {{ $data['sex'] }}</td>
                </tr>
                <tr>
                    <td scope="row" style="width: 20%"><b>Nascimento</b></td>
                    <td style="width: 30%">{{ date('d/m/Y', strtotime($data['birth'])) }}</td>
                    <td style="width:25%"><b>Idade</b> </td>
                    <td style="width:25%"> {{ $data['age'] }}</td>
                </tr>
                <tr>
                    <td scope="row" style="width: 20%"><b>RG</b></td>
                    <td style="width: 30%">{{ $data['rg'] }}</td>
                    <td style="width:25%"><b>CPF</b></td>
                    <td style="width:25%">{{ $data['cpf'] }}</td>
                </tr>
            </tbody>
        </table>
        {{-- INÍCIO DA TABELA--}}

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; border: 1px solid #000!important">
            <tbody>
                <tr>
                    <td colspan="2">Trabalhou em locais com ruído?
                        @if( isset($data['historic1'] )  &&  $data['historic1'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic1'] )  &&  $data['historic1'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Realizava esforço físico?
                        @if( isset($data['historic2'] )  &&  $data['historic2'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic2'] )  &&  $data['historic2'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="4">Ficou exposto a calor ou frio excessivo?
                        @if( isset($data['historic3'] )  &&  $data['historic3'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic3'] )  &&  $data['historic3'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Já trabalhou em lugar com poeira excessiva?
                        @if( isset($data['historic4'] )  &&  $data['historic4'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic4'] )  &&  $data['historic4'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, qual tipo?
                        {{ $data['historic5'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Manipulava produtos químicos?
                        @if( isset($data['historic6'] )  &&  $data['historic6'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic6'] )  &&  $data['historic6'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['historic7'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Realizava movimentos repetitivos?
                        @if( isset($data['historic8'] )  &&  $data['historic8'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic8'] )  &&  $data['historic8'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, qual membro?
                        {{ $data['historic9'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Utilizava equipamento de proteção individual (EPI)?
                        @if( isset($data['historic10'] )  &&  $data['historic10'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic10'] )  &&  $data['historic10'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, qual (is)?
                        {{ $data['historic11'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Já teve acidente de trabalho?
                        @if( isset($data['historic12'] )  &&  $data['historic12'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic12'] )  &&  $data['historic12'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['historic13'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Já teve doença de trabalho?
                        @if( isset($data['historic14'] )  &&  $data['historic14'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic14'] )  &&  $data['historic14'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['historic15'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Exerce outra atividade laboral?
                        @if( isset($data['historic16'] )  &&  $data['historic16'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['historic16'] )  &&  $data['historic16'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['historic17'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABLEA--}}

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; border: 1px solid #000!important">
            <thead>
                <tr>
                    <td colspan="4">2 - Informações Médicas</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">Tem diabetes?
                        @if( isset($data['info1'] )  &&  $data['info1'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info1'] )  &&  $data['info1'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Tem hipertensão?
                        @if( isset($data['info2'] )  &&  $data['info2'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info2'] )  &&  $data['info2'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="2">É Fumante?
                        @if( isset($data['info3'] )  &&  $data['info3'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info3'] )  &&  $data['info3'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Tem problema de audição?
                        @if( isset($data['info4'] )  &&  $data['info4'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info4'] )  &&  $data['info4'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Sofreu algum acidente?
                        @if( isset($data['info5'] )  &&  $data['info5'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info5'] )  &&  $data['info5'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info6'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Tem alergia?
                        @if( isset($data['info7'] )  &&  $data['info7'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info7'] )  &&  $data['info7'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info8'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Tem doença neurológica?
                        @if( isset($data['info9'] )  &&  $data['info9'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info9'] )  &&  $data['info9'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info10'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Realizou cirurgia?
                        @if( isset($data['info11'] )  &&  $data['info11'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info11'] )  &&  $data['info11'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info12'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Tem problemas ortopédito?
                        @if( isset($data['info13'] )  &&  $data['info13'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info13'] )  &&  $data['info13'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info14'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Coluna, quadril, outro?
                        @if( isset($data['info15'] )  &&  $data['info15'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info15'] )  &&  $data['info15'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info16'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Tem ou teve outra doença?
                        @if( isset($data['info17'] )  &&  $data['info17'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info17'] )  &&  $data['info17'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info18'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Faz ou já fez algum tratamento de saúde?
                        @if( isset($data['info19'] )  &&  $data['info19'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info19'] )  &&  $data['info19'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Se sim, quais?
                        {{ $data['info20'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Cólicas ginecológicas?
                        @if( isset($data['info21'] )  &&  $data['info21'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info21'] )  &&  $data['info21'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                    <td colspan="2">Faz uso de medicação?
                        @if( isset($data['info22'] )  &&  $data['info22'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['info22'] )  &&  $data['info22'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABLEA--}}


        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; border: 1px solid #000!important">
            <thead>
                <tr>
                    <td colspan="4">3 - Exames Físicos</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2">Cabeça e pescoço: {{ $data['fisic1'] }} </td>
                    <td colspan="2">Cardio Vascular: {{ $data['fisic2'] }} </td>
                </tr>

                <tr>
                    <td colspan="2">Respiratório: {{ $data['fisic3'] }} </td>
                    <td colspan="2">Abdome: {{ $data['fisic4'] }} </td>
                </tr>

                <tr>
                    <td colspan="2">Osteomuscular: {{ $data['fisic5'] }} </td>
                    <td colspan="2">Neurológico: {{ $data['fisic6'] }} </td>
                </tr>

                <tr>
                    <td colspan="4">Mais informações que julgar necessário: {{ $data['fisic7'] }} </td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABLEA--}}

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; border: 1px solid #000!important">
            <thead>
                <tr>
                    <td colspan="4">4 - Avaliação Clínica</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">Tem alguma queixa de saúde no momento?
                        @if( isset($data['clinic1'] )  &&  $data['clinic1'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['clinic1'] )  &&  $data['clinic1'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABLEA--}}

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; border: 1px solid #000!important">
            <thead>
                <tr>
                    <td colspan="4">5 - Conclusão</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4">Orientação
                        {{ $data['orientation'] }}
                    </td>
                </tr>

                <tr>
                    <td colspan="2">Resultado
                        @if( isset($data['result'] )  &&  $data['result'] == 'Normal')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Normal</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Normal</label>
                        @endif
                        @if( isset($data['result'] )  &&  $data['result'] == 'Anormal')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Anormal </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Anormal </label>
                        @endif
                    </td>
                    <td colspan="2">Clinicamente liberado para o setor e cargo?
                        @if( isset($data['release'] )  &&  $data['release'] == 'Não')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Não</label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Não</label>
                        @endif
                        @if( isset($data['release'] )  &&  $data['release'] == 'Sim')
                            <label  style='display: inline;'> <input type= 'radio' checked/> Sim </label>
                        @else
                            <label  style='display: inline;'> <input type= 'radio' /> Sim </label>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABLEA--}}

        <br />

        <div>
            <label style="font-size: 8pt; margin-top: -10px">Observações:</label>
            <div style="border: 1px solid #000; width: 700px; height: 50px; font-size: 8pt; margin-top: -5px">
                {{ $data['observation'] }}
            </div>
        </div>

        <div>
            <p style="font-size: 8pt; margin-top: 5px">
                Campina Grande - PB, {{ formatDate($data['dataexam16'], 'd/m/Y') }}
            </p>

            <br />

            <table class="table table-borderless" style="font-size: 8pt; margin-top: -10px">
                <tbody style="border: none">
                    <tr style="border: none">
                        <td style="border: none; text-align: center">
                            Assinatura Eletrônica <br />
                            {{ $data['doctorname'] }} <br />
                            CRM/PB: {{ $data['crm'] }}
                        </td>
                        <td style="border: none; text-align: right">
                            Obs: Este documento e suas assinaturas são totalmente digitais.
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </body>
</html>
