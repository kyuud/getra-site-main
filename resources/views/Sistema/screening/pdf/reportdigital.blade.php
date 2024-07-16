<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Triagem</title>

        {{-- ARQUIVOS CSS GERAIS --}}
        <link rel="stylesheet" href="Site/css/bootstrap.min.css">

    </head>
    <body style="font-size: 9pt">
        <div>
            <img src="Painel/light/assets/img/logo.png" style="width: 200px" />
        </div>

        <div style="position: absolute; top: 10px; margin-left: 200px">
            <p style="text-align: center; font-size: 10pt">
                Rua José Elpídio da Costa Monteiro, Nº 92, São José - Campina Grande - PB <br />
                Contatos: (83) 3201-1446 / (83) 99988-1495 - E-mail: getra@getra.com.br
            </p>
        </div>

        <hr style="margin-top: -10px" />

        <div>
            <h6 style="text-align: center; margin-top: -10px">TRIAGEM</h6>
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
                    <td style="width:25%"><b>Idade</b></td>
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
        <table class="table table-bordered" style="background-color: #fff; font-size: 9px; border: 1px solid #000!important">
            <tbody>
                <tr>
                    <td><b>Pressão Arterial-Sistólica</b></td>
                    <td>{{ $data['result1'] }} mm/Hg</td>

                    <td><b>Pressão Arterial-Diastólica</td>
                    <td> {{ $data['result2'] }} mm/Hg</td>

                    <td><b>Temperatura</b></td>
                    <td> {{ $data['result3'] }} °C:</td>
                </tr>

                <tr>
                    <td><b>FC (Frenquência Cardíaca):</b></td>
                    <td>{{ $data['result4'] }} bpm</td>

                    <td><b>IG (Índece Glicêmico):</b></td>
                    <td> {{ $data['result5'] }} ipm</td>

                    <td><b>Triglicerídeos:</b></td>
                    <td> {{ $data['result6'] }} mg/dL</td>
                </tr>

                <tr>
                    <td><b>Colesterol :</b></td>
                    <td> {{ $data['result7'] }} mg/dL</td>

                    <td><b>HDL Colesterol (Bom):</b></td>
                    <td> {{ $data['result8'] }} mg/dL</td>

                    <td><b>LDL Colesterol (Ruim):</b></td>
                    <td> {{ $data['result9'] }} mg/dL</td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABELA--}}

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; font-size: 9px; border: 1px solid #000!important">
            <tbody>
                <tr>
                    <td><b>IMC:</b></td>
                    <td>
                        {{ $data['imc'] }}
                    </td>
                    <td><b>Altura (m):</b></td>
                    <td>
                        {{ $data['height'] }}
                    </td>
                    <td><b>Peso (Kg):</b></td>
                    <td>
                        {{ $data['weight'] }}
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABELA--}}

        {{-- INÍCIO DA TABELA--}}
        <table class="table table-bordered" style="background-color: #fff; font-size: 9px; border: 1px solid #000!important">
            <tbody>
                <tr>
                    <td><b>Circunferência Abdominal:</b></td>
                    <td>
                        {{ $data['result10'] }}
                    </td>
                    <td>cm</td>
                </tr>
            </tbody>
        </table>
        {{-- FINAL DA TABELA--}}

        <br />

        <div>
            <label style="font-size: 9pt; margin-top: -10px">Ficha Médica:</label>
            <div style="border: 1px solid #000; width: 700px; height: 50px; font-size: 9pt; margin-top: -5px">
                {{ $data['medical'] }}
            </div>
        </div>

        <br /><br />

        <div>
            <label style="font-size: 9pt; margin-top: -10px">Observações:</label>
            <div style="border: 1px solid #000; width: 700px; height: 50px; font-size: 9pt; margin-top: -5px">
                {{ $data['note'] }}
            </div>
        </div>

        <br />

        <div>
            <p style="font-size: 9pt; margin-top: 5px">
                Campina Grande - PB, {{ formatDate($data['dataexam16'], 'd/m/Y') }}
            </p>

            <br />

            <table class="table table-borderless" style="font-size: 9pt; margin-top: -5px">
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

