@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Sistema.periodical.employees')
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
                    <h4> Periódico / Mudança de Função </h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['periodical.update', $data->id], 'class' => 'form', 'files' => true, 'method' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'periodical.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                        {!! Form::hidden('redirects_to', URL::previous()) !!}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome da empresa</label>
                                    {!! Form::select('company_id', $companies, null,
                                    ['placeholder' => 'Selecione a empresa', 'class' => "form-control", "name" => "company_id"])!!}
                                    @error('company_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nome do funcionário</label>
                                    {!! Form::select('employee_id', $employees, null,
                                    ['placeholder' => 'Selecione o funcionário', 'class' => "form-control", "name" => "employee_id"])!!}
                                    @error('employee_id')<div class="text-danger">{{ "***$message" }}</div>@enderror
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

                            <div class="col-md-12">
                                <strong>1 - Tipo de Exame</strong>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>
                                        <label> {!! Form::radio('exam1', 'periodical');!!} Periódico </label>
                                        <label> {!! Form::radio('exam1', 'change');!!} Mudança de Função </label>
                                        @error('exam1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <strong >2 - Avaliação Clínica</strong>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>Faz uso de medicação atualmente?</div>
                                    <div>
                                        <label> {!! Form::radio('clinic1', 'Não');!!} Não </label>

                                        <label> {!! Form::radio('clinic1', 'Sim');!!} Sim</label>

                                        @error('clinic1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>Se sim, qual (is)?</div>
                                    <div>
                                        {!! Form::text('clinic2', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "clinic2"])!!}
                                        @error('clinic2')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>Tem alguma queixa no momento?</div>
                                    <div>
                                        <label> {!! Form::radio('clinic3', 'Não');!!} Não </label>

                                        <label> {!! Form::radio('clinic3', 'Sim');!!} Sim</label>

                                        @error('clinic3')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>Se sim, qual (is)?</div>
                                    <div>
                                        {!! Form::text('clinic4', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "clinic4"])!!}
                                        @error('clinic4')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div>Faz algum tratamento não medicamentoso? </div>
                                    <div>
                                        <label> {!! Form::radio('clinic5', 'Não');!!} Não </label>

                                        <label> {!! Form::radio('clinic5', 'Sim');!!} Sim</label>

                                        @error('clinic5')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>Se sim, qual (is)?</div>
                                    <div>
                                        {!! Form::text('clinic6', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "clinic6"])!!}
                                        @error('clinic6')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <strong >3 - Exames Físicos</strong>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>Cabeça e pescoço</div>
                                    {!! Form::text('fisic1', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic1"])!!}
                                    @error('fisic1')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>Cardio Vascular</div>
                                    {!! Form::text('fisic2', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic2"])!!}
                                    @error('fisic2')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>Respiratório</div>
                                    {!! Form::text('fisic3', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic3"])!!}
                                    @error('fisic3')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>Abdome</div>
                                    {!! Form::text('fisic4', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic4"])!!}
                                    @error('fisic4')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>Osteomuscular</div>
                                    {!! Form::text('fisic5', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic5"])!!}
                                    @error('fisic5')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>Neurológico</div>
                                    {!! Form::text('fisic6', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic6"])!!}
                                    @error('fisic6')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <div>Mais informações que julgar necessário</div>
                                    {!! Form::text('fisic7', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "fisic7"])!!}
                                    @error('fisic7')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <strong >4 - Conclusão</strong>
                                    <div>Orientação</div>
                                        {!! Form::text('orientation', null,
                                        ['placeholder' => '...', 'class' => "form-control", "name" => "orientation"])!!}
                                        @error('orientation')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>Resultado</div>
                                    <div>
                                        <label> {!! Form::radio('result', 'Normal');!!} Normal </label>

                                        <label> {!! Form::radio('result', 'Anormal');!!} Anormal</label>

                                        @error('result')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <div>Clinicamente liberado para o setor e cargo?</div>
                                    <div>
                                        <label> {!! Form::radio('release', 'Não');!!} Não </label>

                                        <label> {!! Form::radio('release', 'Sim');!!} Sim</label>

                                        @error('release')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
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

                        </div> {{-- FINAL DA ROW--}}

                        <div class="card-footer text-right">
                            {!! Form::submit('Salvar', ['class' => 'btn btn-primary mr-1']) !!}

                            {{-- @if( !isset($data) )
                                {!! Form::submit('Salvar & Criar Novo', ['id'=>'save_add', 'class' => 'btn btn-info mr-1']) !!}
                            @endif --}}

                            <a class="btn btn-secondary" onclick="history.go(-1);" style="cursor:pointer">Cancelar</a>
                        </div>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
