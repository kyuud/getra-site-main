@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Sistema.anamnese.employees')
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
                    <h4> Anamnese </h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['anamnese.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'anamnese.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome da empresa</label>
                                    {!! Form::select('company_id', $companies, null,
                                    ['placeholder' => 'Selecione a empresa', 'class' => "form-control", "name" => "company_id"])!!}
                                    @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome do funcionário</label>
                                    {!! Form::select('employee_id', $employees, null,
                                    ['placeholder' => 'Selecione o funcionário', 'class' => "form-control", "name" => "employee_id"])!!}
                                    @error('employee_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nome do Médico</label>
                                    {!! Form::select('doctor_id', $doctors, null,
                                    ['placeholder' => 'Selecione o médico', 'class' => "form-control", "name" => "doctor_id"])!!}
                                    @error('doctor_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cargo</label>
                                    {!! Form::text('occupation', null,
                                    ['readonly' => '...', 'class' => "form-control", "name" => "occupation"])!!}
                                    @error('occupation')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    {!! Form::text('sex', null,
                                    ['readonly' => '...', 'class' => "form-control", "name" => "sex"])!!}
                                    @error('sex')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>RG</label>
                                    {!! Form::number('rg', null,
                                    ['readonly' => '...', 'class' => "form-control", "name" => "rg"])!!}
                                    @error('rg')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CPF</label>
                                    {!! Form::number('cpf', null,
                                    ['readonly' => '...', 'class' => "form-control", "name" => "cpf"])!!}
                                    @error('cpf')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Data de nascimento</label>
                                    {!! Form::date('birth', null,
                                    ['readonly' => '...', 'class' => "form-control", "name" => "birth"])!!}
                                    @error('birth')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Idade</label>
                                    {!! Form::number('age', null,
                                    ['readonly' => '...', 'class' => "form-control", "name" => "age"])!!}
                                    @error('age')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>



                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Trabalhou em locais com ruído? </label>
                                    <label> {!! Form::radio('historic1', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic1', 'Sim');!!} Sim</label>

                                    @error('historic1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Realizava esforço físico?</label>
                                    <label> {!! Form::radio('historic2', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic2', 'Sim');!!} Sim</label>

                                    @error('historic2')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ficou exposto a calor ou frio excessivo?</label>
                                    <label> {!! Form::radio('historic3', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic3', 'Sim');!!} Sim</label>

                                    @error('historic3')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Já trabalhou em lugar com poeira excessiva?</label>
                                    <label> {!! Form::radio('historic4', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic4', 'Sim');!!} Sim</label>

                                    @error('historic4')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, qual tipo?</label>
                                    {!! Form::text('historic5', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic5"])!!}
                                    @error('historic5')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Manipulava produtos químicos?</label>
                                    <label> {!! Form::radio('historic6', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic6', 'Sim');!!} Sim</label>

                                    @error('historic6')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('historic7', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic7"])!!}
                                    @error('historic7')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Realizava movimentos repetitivos?</label>
                                    <label> {!! Form::radio('historic8', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic8', 'Sim');!!} Sim</label>

                                    @error('historic8')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>se sim, qual membro?</label>
                                    {!! Form::text('historic9', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic9"])!!}
                                    @error('historic9')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Utilizava equipamento de proteção individual (EPI)?</label>
                                    <label> {!! Form::radio('historic10', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic10', 'Sim');!!} Sim</label>

                                    @error('historic10')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>se sim, qual membro?</label>
                                    {!! Form::text('historic11', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic11"])!!}
                                    @error('historic11')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Já teve acidente de trabalho?</label>
                                    <label> {!! Form::radio('historic12', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic12', 'Sim');!!} Sim</label>

                                    @error('historic12')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('historic13', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic13"])!!}
                                    @error('historic13')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Já teve doença de trabalho?</label>
                                    <label> {!! Form::radio('historic14', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic14', 'Sim');!!} Sim</label>

                                    @error('historic14')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('historic15', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic15"])!!}
                                    @error('historic15')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Exerce outra atividade laboral?</label>
                                    <label> {!! Form::radio('historic16', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('historic16', 'Sim');!!} Sim</label>

                                    @error('historic16')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('historic17', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "historic17"])!!}
                                    @error('historic17')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label> <strong> 2 - Informações Médicas </strong> </label>
                            </div>
                            <br>
                            <br>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tem diabetes?</label>
                                    <label> {!! Form::radio('info1', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info1', 'Sim');!!} Sim</label>

                                    @error('info1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tem hipertensão?</label>
                                    <label> {!! Form::radio('info2', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info2', 'Sim');!!} Sim</label>

                                    @error('info2')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>É Fumante?</label>
                                    <label> {!! Form::radio('info3', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info3', 'Sim');!!} Sim</label>

                                    @error('info3')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tem problema de audição?</label>
                                    <label> {!! Form::radio('info4', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info4', 'Sim');!!} Sim</label>

                                    @error('info4')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sofreu algum acidente?</label>
                                    <label> {!! Form::radio('info5', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info5', 'Sim');!!} Sim</label>

                                    @error('info5')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info6', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info6"])!!}
                                    @error('info6')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tem alergia?</label>
                                    <label> {!! Form::radio('info7', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info7', 'Sim');!!} Sim</label>

                                    @error('v7')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info8', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info8"])!!}
                                    @error('info8')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tem doença neurológica?</label>
                                    <label> {!! Form::radio('info9', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info9', 'Sim');!!} Sim</label>

                                    @error('info9')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info10', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info10"])!!}
                                    @error('info10')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Realizou cirurgia?</label>
                                    <label> {!! Form::radio('info11', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info11', 'Sim');!!} Sim</label>

                                    @error('info11')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info12', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info12"])!!}
                                    @error('info12')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tem problemas ortopédico?</label>
                                    <label> {!! Form::radio('info13', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info13', 'Sim');!!} Sim</label>

                                    @error('info13')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info14', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info14"])!!}
                                    @error('info14')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Coluna, quadril, outro?</label>
                                    <label> {!! Form::radio('info15', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info15', 'Sim');!!} Sim</label>

                                    @error('info15')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info16', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info16"])!!}
                                    @error('info16')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tem ou teve outra doença?</label>
                                    <label> {!! Form::radio('info17', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info17', 'Sim');!!} Sim</label>

                                    @error('info17')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info18', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info18"])!!}
                                    @error('info18')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Faz ou já fez algum tratamento de saúde?</label>
                                    <label> {!! Form::radio('info19', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info19', 'Sim');!!} Sim</label>

                                    @error('info19')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                                <div class="form-group">
                                    <label>Se sim, quais?</label>
                                    {!! Form::text('info20', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "info20"])!!}
                                    @error('info20')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cólicas ginecológicas?</label>
                                    <label> {!! Form::radio('info21', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info21', 'Sim');!!} Sim</label>

                                    @error('info21')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Faz uso de medicação?</label>
                                    <label> {!! Form::radio('info22', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('info22', 'Sim');!!} Sim</label>

                                    @error('info22')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label> <strong> 3 - Exames Físicos </strong> </label>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cabeça e pescoço</label>
                                    {!! Form::text('fisic1', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic1"])!!}
                                    @error('fisic1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cardio Vascular</label>
                                    {!! Form::text('fisic2', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic2"])!!}
                                    @error('fisic2')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Respiratório</label>
                                    {!! Form::text('fisic3', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic3"])!!}
                                    @error('fisic3')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Abdome</label>
                                    {!! Form::text('fisic4', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic4"])!!}
                                    @error('fisic4')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Osteomuscular</label>
                                    {!! Form::text('fisic5', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic5"])!!}
                                    @error('fisic5')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Neurológico</label>
                                    {!! Form::text('fisic6', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic6"])!!}
                                    @error('fisic6')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Mais informações que julgar necessário</label>
                                    {!! Form::text('fisic7', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic7"])!!}
                                    @error('fisic7')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label> <strong> 4 - Avaliação Clínica </strong> </label>
                            </div>
                            <br>
                            <br>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tem alguma queixa de saúde no momento?</label>
                                    <label> {!! Form::radio('clinic1', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('clinic1', 'Sim');!!} Sim</label>

                                    @error('result')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label> <strong> 5 - Conclusão </strong> </label>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Orientação</label>
                                    {!! Form::text('orientation', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "orientation"])!!}
                                    @error('orientation')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Resultado</label>
                                    <div>
                                        <label> {!! Form::radio('result', 'Normal');!!} Normal </label>

                                        <label> {!! Form::radio('result', 'Anormal');!!} Anormal</label>

                                        @error('result')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Clinicamente liberado para o setor e cargo?</label>
                                    <label> {!! Form::radio('release', 'Não');!!} Não </label>

                                    <label> {!! Form::radio('release', 'Sim');!!} Sim</label>

                                    @error('release')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação:</label>
                                    {!! Form::textarea('observation', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "observation"])!!}
                                    @error('observation')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Selecione a data que foi realizado o Anamnese:</label>
                                    {!! Form::date('dataexam16', null,
                                ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam16"])!!}
                                    @error('dataexam16')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-9" style="text-align: left"> </div>

                        </div> {{-- FINAL DA ROW--}}

                        <div class="card-footer text-right">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary mr-1']) !!}

                            {{-- @if( !isset($data) )
                                {!! Form::submit('Salvar & Criar Novo', ['id'=>'save_add', 'class' => 'btn btn-info mr-1']) !!}
                            @endif --}}

                            <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
