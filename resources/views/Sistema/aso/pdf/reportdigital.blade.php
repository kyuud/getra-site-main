<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Aso</title>

        {{-- ARQUIVOS CSS GERAIS --}}
        <link rel="stylesheet" href="Site/css/bootstrap.min.css">

    </head>
    <body>
        <div>
            <img src="Painel/light/assets/img/logo.png" style="width: 200px" />
        </div>

        <div style="position: absolute; top: 10px; margin-left: 200px">
            <p style="text-align: center; font-size: 10pt">
                Rua José Elpídio da Costa Monteiro, Nº 92, São José - Campina Grande - PB <br />
                Contatos: (83) 3201-1446 / (83) 99988-1495 - E-mail: getra@getra.com.br
            </p>
        </div>

        <hr style="margin-top: -10px; background-color: #4c4b4b" />

        <div>
            <h6 style="text-align: center; margin-top: -10px">ASO - ATESTADO DE SAÚDE OCUPACIONAL</h6>
        </div>

        <div>
            <table class="table table-bordered" style="font-size: 8pt">
                <tbody>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>Empresa</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b" colspan="5"> {{ $data['company_name'] }} </td>
                    </tr>

                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>CNPJ</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b" colspan="5"> {{ formatCnpjCpf($data['cnpj']) }}</td>
                    </tr>

                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>Funcionário</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b" colspan="5"> {{ $data['name'] }} </td>
                    </tr>

                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>Função</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['occupation'] }} </td>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>Nascimento</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ date('d/m/Y', strtotime($data['birth'])) }} </td>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>Idade</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['age'] }} </td>
                    </tr>

                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>RG</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['rg'] }} </td>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>Sexo</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['sex'] }} </td>
                        <td style="padding: 5px; border-color: #4c4b4b"><b>CPF</b></td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ formatCnpjCpf($data['cpf']) }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="border: none; margin-top: -15px">
            <table class="table table-borderless" style="font-size: 8pt">
                <tbody style="border: none">
                    <tr style="border: none">
                        <td style="border: none">Admissional</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['exam'] )  &&  $data['exam'] == 'admission')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif

                        </td>
                        <td style="border: none">Demissional</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['exam'] )  &&  $data['exam'] == 'dismissal')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                        <td style="border: none">Periódico</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['exam'] )  &&  $data['exam'] == 'periodical')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                    </tr>
                    <tr style="border: none">
                        <td style="border: none">Mudança de Função</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['exam'] )  &&  $data['exam'] == 'change')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                        <td style="border: none">Retorno ao Trabalho</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['exam'] )  &&  $data['exam'] == 'return')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr style="margin-top: -15px; background-color: #4c4b4b" />

        <div style="border: none; margin-top: -15px">
            <table class="table table-borderless" style="font-size: 8pt">
                <tbody style="border: none">
                    <tr style="border: none">
                        <td style="border: none">Químico</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['chemical'] )  &&  $data['chemical'] == 'risc')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                        <td style="border: none">Físicos</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['physicist'] )  &&  $data['physicist'] == 'risc')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                        <td style="border: none">Biológicos</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['biological'] )  &&  $data['biological'] == 'risc')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                        <td style="border: none">Ergonômicos</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['ergonomic'] )  &&  $data['ergonomic'] == 'risc')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <hr style="margin-top: -15px; background-color: #4c4b4b" />

        <div style="border: none; margin-top: -15px">
            <table class="table table-borderless" style="font-size: 8pt">
                <tbody style="border: none">
                    <tr style="border: none">
                        <td style="border: none">Apto</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['attest'] )  &&  $data['attest'] == 'apto')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                        <td style="border: none">Inapto</td>
                        <td style="min-width: 10px; border: none">
                            @if(isset($data['attest'] )  &&  $data['attest'] == 'inapto')
                                (X)
                            @else
                                ( &nbsp; )
                            @endif
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div>
            <table class="table table-bordered table-sm" style="font-size: 8pt; margin-top: -15px">
                <thead>
                    <tr>
                        <th style="padding: 5px; border-color: #4c4b4b">Data / Exame</th>
                        <th style="text-align: center; padding: 5px; border-color: #4c4b4b">Código Tabela 27</th>
                        <th style="padding: 5px; border-color: #4c4b4b">Procedimentos Diagnósticos (Exame)</th>
                        <th style="padding: 5px; border-color: #4c4b4b">Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam1'] != ''? formatDate($data['dataexam1'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">693</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Hemograma/Plaquetas</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result1'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam2'] != ''? formatDate($data['dataexam2'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">658</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Glicemia de Jejum</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result2'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam4'] != ''? formatDate($data['dataexam4'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">974</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Parasitológico de Fezes</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result4'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam8'] != ''? formatDate($data['dataexam8'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">1415</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Radiografia do Tórax PA</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result8'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam9'] != ''? formatDate($data['dataexam9'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">1057</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Espirometria</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result9'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam10'] != ''? formatDate($data['dataexam10'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">530</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Eletrocardiograma</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result10'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam11'] != ''? formatDate($data['dataexam11'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">536</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Eletroencefalograma</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result11'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam12'] != ''? formatDate($data['dataexam12'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">283</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Audiometria Tonal</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result12'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam13'] != ''? formatDate($data['dataexam13'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">295</td>
                        <td style="padding: 5px; border-color: #4c4b4b">ASO - Sem Exames Complementares</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result13'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam14'] != ''? formatDate($data['dataexam14'], 'd/m/Y'): '') }} </td>
                        <td style="text-align: center; padding: 5px; border-color: #4c4b4b">S-2221</td>
                        <td style="padding: 5px; border-color: #4c4b4b">Exame Toxicológico: Admissional / Demissional</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result14'] }} </td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ ($data['dataexam15'] != ''? formatDate($data['dataexam15'], 'd/m/Y'): '') }} </td>
                        <td style="padding: 5px; border-color: #4c4b4b"></td>
                        <td style="padding: 5px; border-color: #4c4b4b">Outros Exames Complementares</td>
                        <td style="padding: 5px; border-color: #4c4b4b"> {{ $data['result15'] }} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <label style="font-size: 8pt; margin-top: -10px">Observações:</label>
            <div style="border: 1px solid #000; width: 700px; height: 50px; font-size: 8pt; margin-top: -5px">
                {{ $data['note'] }}
            </div>
        </div>

        <div>
            <p style="font-size: 8pt; margin-top: 5px">
                Campina Grande - PB, {{ formatDate($data['dataexam16'], 'd/m/Y') }}
            </p>
            <br /><br />

            <table class="table table-borderless" style="font-size: 8pt; margin-top: -10px">
                <tbody style="border: none">
                    <tr style="border: none">
                        <td style="border: none; text-align: center">
                            Assinatura Eletrônica <br />
                            {{ $data['doctorname'] }} <br />
                            CRM/PB: {{ $data['crm'] }} <br />
                            Medicina do trabalho
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
