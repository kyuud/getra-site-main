@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Sistema.screening.employees')
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
                    <h4> Triagem </h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['screening.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'screening.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
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
                                    <label>PA (Pressão Arterial) - Sistólica </label>
                                        {!! Form::number('result1', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result1"]) !!}
                                        @error('result1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>mm/Hg</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PA (Pressão Arterial) - Diastólica</label>
                                        {!! Form::number('result2', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result2"]) !!}
                                        @error('result2')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>mm/Hg</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Temperatura:</label>
                                    <td>
                                        {!! Form::number('result3', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result3"]) !!}
                                        @error('result3')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </td>
                                    <label>°C</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>FC (Frenquência Cardíaca): </label>
                                        {!! Form::number('result4', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result4"]) !!}
                                        @error('result4')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>bpm</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>IG (Índece Glicêmico): </label>
                                        {!! Form::number('result5', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result5"]) !!}
                                        @error('result5')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>ipm</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Triglicerídeos:</label>
                                        {!! Form::number('result6', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result6"]) !!}
                                        @error('result6')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>mg/dL</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Colesterol:</label>
                                        {!! Form::number('result7', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result7"]) !!}
                                        @error('result7')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>mg/dL</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>HDL Colesterol (Bom): </label>
                                        {!! Form::number('result8', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result8"]) !!}
                                        @error('result8')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>mg/dL</label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>LDL Colesterol (Ruim):</label>
                                        {!! Form::number('result9', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result9"]) !!}
                                        @error('result9')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label>mg/dL</label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> IMC: </label>
                                        {!! Form::number('imc', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "imc"]) !!}
                                        @error('imc')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Altura: </label>
                                        {!! Form::number('height', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "height"]) !!}
                                        @error('height')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label> (m): </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Peso: </label>
                                        {!! Form::number('weight', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "weight"]) !!}
                                        @error('weight')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label> (Kg) </label>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Circunferência Abdominal: </label>
                                        {!! Form::number('result10', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "result10"]) !!}
                                        @error('result10')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    <label> (cm) </label>
                                </div>
                            </div>

                        </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Observação:</label>
                                    {!! Form::textarea('note', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "note"])!!}
                                    @error('note')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Ficha Médica</label>
                                    {!! Form::textarea('medical', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "medical"])!!}
                                    @error('medical')<div class="text-danger">{{ "***$message" }}</div>@enderror
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


                        </div> {{-- FINAL --}}

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
