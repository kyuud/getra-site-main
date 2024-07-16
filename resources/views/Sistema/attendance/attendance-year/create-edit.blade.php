@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Painel.includes.checkbox')
    @include('Sistema.attendance.companies')
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
                    <h4> Cadastrar Atendimento </h4>
                </div>
                <div class="card-body">


                    {!! Form::open(['route' => 'attendance.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}

                    {!! Form::hidden('redirects_to', URL::previous()) !!}

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hora do Atendimento</label>
                                {!! Form::select('hour', $hour, null,
                                ['placeholder' => 'Selecione o Horário para Atendimento', 'class' => "form-control", "name" => "hour"])!!}
                                @error('hour')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do funcionário</label>
                                {!! Form::select('employee_id', $employees, null,
                                ['placeholder' => 'Selecione o funcionário', 'class' => "form-control", "name" => "employee_id"])!!}
                                @error('employee_id')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome da empresa</label>
                                {!! Form::select('company_id', $companies, null,
                        ['placeholder' => 'Selecione a empresa', 'class' => "form-control", "name" => "company_id"])!!}
                                @error('company_id')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do Médico</label>
                                {!! Form::select('doctor_id', $doctors, null,
                                ['placeholder' => 'Selecione o médico', 'class' => "form-control", "name" => "doctor_id"])!!}
                                @error('doctor_id')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nome do Técnico Responsável</label>
                                {!! Form::select('technician_id', $technician,null,
                                ['placeholder' => 'Selecione o funcionário', 'class' => "form-control", "name" => "technician_id"])!!}
                                @error('technician_id')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CNPJ</label>
                                {!! Form::text('cnpj', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "cnpj"])!!}
                                @error('cnpj')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cargo</label>
                                {!! Form::text('occupation', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "occupation"])!!}
                                @error('occupation')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        {{-- <div class="col-md-4">
                             <div class="form-group">
                                 <label>Sexo</label>
                                 {!! Form::text('sex', null,
                                 ['readonly' => '...', 'class' => "form-control", "name" => "sex"])!!}
                                 @error('sex')
                                 <div class="text-danger">{{ "***$message" }}</div>@enderror
                             </div>
                         </div>

                         --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>RG</label>
                                {!! Form::number('rg', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "rg"])!!}
                                @error('rg')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>CPF</label>
                                {!! Form::number('cpf', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "cpf"])!!}
                                @error('cpf')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Data de nascimento</label>
                                {!! Form::date('birth', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "birth"])!!}
                                @error('birth')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4" style="display: flex; flex-direction: column; justify-content: center;">
                            <h5>Exame</h5>

                            <label> {!! Form::radio('exam', 'admission');!!} Admissional </label>

                            <label> {!! Form::radio('exam', 'dismissal');!!} Demissional </label>

                            <label> {!! Form::radio('exam', 'periodical');!!} Periódico </label>

                            <label> {!! Form::radio('exam', 'change');!!} Mudança de Função </label>

                            <label>{!! Form::radio('exam', 'return');!!} Retorno ao Trabalho </label>

                            @error('exam')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="col-md-4" style="display: flex; flex-direction: column; justify-content: center;">
                            <h5>Modalidade</h5>

                            <label> {!! Form::radio('modality', 'inPerson');!!} Presencial </label>

                            <label> {!! Form::radio('modality', 'telemedicine');!!} Telemedicina</label>

                            <label> {!! Form::radio('modality', 'external');!!} Externo</label>

                            @error('exam')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Realizado? (Não/Sim)</label>
                                <br style="clear: both"/>
                                @if(isset($data['status']) && $data['status'] == 1)
                                    <label class="custom-switch mt-2">
                                        {!! Form::checkbox('status', 1, true,
                                            ['class'=>'custom-switch-input',
                                            'id'   =>'status']) !!}
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                @else
                                    <label class="custom-switch mt-2">
                                        {!! Form::checkbox('status', 0, false,
                                            ['class'=>'custom-switch-input',
                                            'id'   =>'status']) !!}
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observação:</label>
                                {!! Form::textarea('note', null,
                                ['placeholder' => '...', 'class' => "form-control", "name" => "note"])!!}
                                @error('note')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                    </div>


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
