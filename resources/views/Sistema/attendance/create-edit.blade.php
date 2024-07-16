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


                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['attendance.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'attendance.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                    {!! Form::hidden('redirects_to', URL::previous()) !!}


                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data e Hora do atendimento</label>
                                {!! Form::DateTimeLocal('attendance_date', null, ['placeholder' => 'Digite a Data de atendimento aqui...', 'class' => "form-control"])
                                !!}
                                @error('attendance_date')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        @if (isset($data))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome do Técnico Responsável</label>
                                    {!! Form::select('technician_id', $technician, null,
                                    ['placeholder' => 'Selecione o Técnico Responsável pelo Atendimento', 'class' => "form-control", "name" => "technician_id"])!!}
                                    @error('technician_id')
                                    <div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>
                        @else
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome do Técnico Responsável</label>
                                    {!! Form::select('technician_id', $technician, null,
                                    ['placeholder' => 'Selecione o Técnico Responsável pelo Atendimento', 'class' => "form-control", "name" => "technician_id"])!!}
                                    @error('technician_id')
                                    <div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>CNPJ</label>
                                {!! Form::text('cnpj', null,
                                ['placeholder' => 'Digite o CNPJ da Empresa', 'class' => "form-control", "name" => "cnpj"])!!}
                                @error('cnpj')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome da empresa</label>
                                {!! Form::text('company', null,
                                ['placeholder' => 'Selecione a empresa', 'class' => "form-control"])!!}
                                @error('company')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do funcionário</label>
                                {!! Form::text('employee', null,
                                ['placeholder' => 'Selecione o funcionário', 'class' => "form-control", "name" => "employee"])!!}
                                @error('employee')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Função</label>
                                {!! Form::text('occupation', null,
                                ['class' => "form-control", "name" => "occupation"])!!}
                                @error('occupation')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Data de nascimento</label>
                                {!! Form::date('birth', null,
                                ['class' => "form-control", "name" => "birth"])!!}
                                @error('birth')
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


                        {{-- <div class="col-md-4">
                             <div class="form-group">
                                 <label>Sexo</label>
                                 {!! Form::text('sex', null,
                                 ['readonly' => '...', 'class' => "form-control", "name" => "sex"])!!}
                                 @error('sex')
                                 <div class="text-danger">{{ "***$message" }}</div>@enderror
                             </div>
                         </div>



                        <div class="col-md-4">
                            <div class="form-group">
                                <label>RG</label>
                                {!! Form::number('rg', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "rg"])!!}
                                @error('rg')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>--}}


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Exame</label>
                                {!! Form::select('exam_id', $exam, null, ['placeholder' => 'Selecione o tipo de exame aqui', 'class' => "form-control", 'name' => 'exam_id']) !!}
                                @error('exam')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-goup">
                                <label>Modalidade</label>
                                {!! Form::select('modality_id', $modality, null, ['placeholder' => 'Selecione a modalidade do exame aqui', 'class' => "form-control", 'name' => 'modality_id']) !!}
                                @error('exam')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Realizado? (Não/Sim)</label>
                                <br style="clear: both"/>
                                @if(isset($data['accomplished']) && $data['accomplished'] == 1)
                                    <label class="custom-switch mt-2">
                                        {!! Form::checkbox('accomplished', 1, true,
                                            ['class'=>'custom-switch-input',
                                            'id'   =>'accomplished']) !!}
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                @else
                                    <label class="custom-switch mt-2">
                                        {!! Form::checkbox('accomplished', 0, false,
                                            ['class'=>'custom-switch-input',
                                            'id'   =>'accomplished']) !!}
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Observação:</label>
                                {!! Form::textarea('observation', null,
                                ['placeholder' => '...', 'class' => "form-control", "name" => "observation"])!!}
                                @error('note')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                    </div>


                    <div class="card-footer text-right">
                        {!! Form::submit('Salvar', ['class' => 'btn btn-primary mr-1']) !!}

                        @if( !isset($data) )
                            {!! Form::submit('Salvar & Criar Novo', ['id'=>'save_add', 'class' => 'btn btn-info mr-1']) !!}
                        @endif

                        <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
