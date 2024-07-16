@extends('Sistema.templates.template_01')

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

@push('css-extra') @endpush

@push('js-extra')
    @include('Painel.includes.image')
    @include('Painel.includes.save')
    @include('Sistema.aso.employees')
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
                    <h4> ASO - Atestado de saúde ocupacional </h4>
                </div>
                <div class="card-body">

                    @if( isset($data) )
                        {!! Form::model($data, ['route' => ['aso.update', $data->id], 'class' => 'form', 'files' => true, 'medivod' => 'PUT']) !!}
                    @else
                        {!! Form::open(['route' => 'aso.store', 'id'=>'formStore', 'class' => 'form', 'files' => true]) !!}
                    @endif

                    {!! Form::hidden('redirects_to', URL::previous()) !!}

                    <div class="row">
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
                                <label>Nome do funcionário</label>
                                {!! Form::select('employee_id', $employees, null,
                                ['placeholder' => 'Selecione o funcionário', 'class' => "form-control", "name" => "employee_id"])!!}
                                @error('employee_id')
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

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome do Médico Responsável</label>
                                {!! Form::select('doctor_id2', $doctors, null,
                                ['placeholder' => 'Selecione o médico', 'class' => "form-control", "name" => "doctor_id2"])!!}
                                @error('doctor_id2')
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

                        <div class="col-md-4">
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Idade</label>
                                {!! Form::number('age', null,
                                ['readonly' => '...', 'class' => "form-control", "name" => "age"])!!}
                                @error('age')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
                            </div>
                        </div>

                        <div class="col-md-4" style="display: flex; flex-direction: column; justify-content: center;">
                            <h5>Exame</h5>

                            <label> {!! Form::radio('exam', 'admission');!!} Admissional </label>

                            <label> {!! Form::radio('exam', 'dismissal');!!} Demissional</label>

                            <label> {!! Form::radio('exam', 'periodical');!!} Periódico</label>

                            <label> {!! Form::radio('exam', 'change');!!} Mudança de Função</label>

                            <label>{!! Form::radio('exam', 'return');!!} Retorno ao Trabalho</label>

                            @error('exam')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-4" style="display: flex; flex-direction: column; justify-content: center;">
                            <h5>Riscos Expostos</h5>
                            <div>
                                <label>{!! Form::checkbox('chemical', 'risc');!!} Químicos</label>
                            </div>
                            <div>
                                <label>{!! Form::checkbox('physicist', 'risc');!!} Físicos</label>
                            </div>
                            <div>
                                <label>{!! Form::checkbox('biological', 'risc');!!} Biológicos</label>
                            </div>
                            <div>
                                <label>{!! Form::checkbox('ergonomic', 'risc');!!} Ergonômicos</label>
                            </div>
                            @error('risc')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-4">
                            <h6>
                                Atesto para todos os fins, que o Senhor(a), acima citado,
                                foi submetido(a) a exame ocupacional e encontra-se:
                            </h6>
                            <label class="col-6">{!! Form::radio('attest', 'apto');!!} Apto</label>

                            <label class="col-6">{!! Form::radio('attest', 'inapto');!!} Inapto</label>

                            @error('attest')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                    </div>

                    <br />

                    <div class="row">

                        <div class="col-md-3" style="text-align: center"><strong> Data do Exame </strong></div>
                        <div class="col-md-3" style="text-align: center"><strong> Código Tabela 27 </strong></div>
                        <div class="col-md-3" style="text-align: center">
                            <strong> Procedimentos Diagnósticos (Exame) </strong></div>
                        <div class="col-md-3" style="text-align: center"><strong> Resultado </strong></div>

                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam1', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam1"])!!}
                            @error('dataexam1')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">693</div>
                        <div class="col-md-3" style="text-align: center">Hemograma/Plaquetas</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result1', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result1"]) !!}
                            @error('result1')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam2', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam2"])!!}
                            @error('dataexam2')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">658</div>
                        <div class="col-md-3" style="text-align: center">Glicemia de Jejum</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result2', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result2"])!!}
                            @error('result2')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::date('dataexam3', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam3"])!!}--}}
{{--                            @error('dataexam3')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3" style="text-align: center">403</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">Creatinina</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::text('result3', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "result3"])!!}--}}
{{--                            @error('result3')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam4', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam4"])!!}
                            @error('dataexam4')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">974</div>
                        <div class="col-md-3" style="text-align: center">Parasitológico de Fezes</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result4', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result4"])!!}
                            @error('result4')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::date('dataexam5', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam5"])!!}--}}
{{--                            @error('dataexam5')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3" style="text-align: center">1123</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">V.D.R.L.</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::text('result5', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "result5"])!!}--}}
{{--                            @error('result5')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}


{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::date('dataexam6', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam6"])!!}--}}
{{--                            @error('dataexam6')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3" style="text-align: center">0699 a 0707</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">Exames para Hepatites</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::text('result6', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "result6"])!!}--}}
{{--                            @error('result6')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}


{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::date('dataexam7', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam7"])!!}--}}
{{--                            @error('dataexam7')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}
{{--                        <div class="col-md-3" style="text-align: center">321</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">Bilirrubinas T e Frações</div>--}}
{{--                        <div class="col-md-3" style="text-align: center">--}}
{{--                            {!! Form::text('result7', null,--}}
{{--                            ['placeholder' => '...', 'class' => "form-control", "name" => "result7"])!!}--}}
{{--                            @error('result7')--}}
{{--                            <div class="text-danger">{{ "***$message" }}</div>@enderror--}}
{{--                        </div>--}}


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam8', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam8"])!!}
                            @error('dataexam8')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">1415</div>
                        <div class="col-md-3" style="text-align: center">Radiografia do Tórax PA</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result8', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result8"])!!}
                            @error('result8')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam9', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam9"])!!}
                            @error('dataexam9')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">1057</div>
                        <div class="col-md-3" style="text-align: center">Espirometria</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result9', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result9"])!!}
                            @error('result9')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam10', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam10"])!!}
                            @error('dataexam10')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">530</div>
                        <div class="col-md-3" style="text-align: center">Eletrocardiograma</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result10', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result10"])!!}
                            @error('result10')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam11', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam11"])!!}
                            @error('dataexam11')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">536</div>
                        <div class="col-md-3" style="text-align: center">Eletroencefalograma</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result11', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result11"])!!}
                            @error('result11')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam12', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam12"])!!}
                            @error('dataexam12')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">283</div>
                        <div class="col-md-3" style="text-align: center">Audiometria Tonal</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result12', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result12"])!!}
                            @error('result12')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam13', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam13"])!!}
                            @error('dataexam13')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">295</div>
                        <div class="col-md-3" style="text-align: center">ASO – Sem Exames Complementares</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result13', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result13"])!!}
                            @error('result13')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam14', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam14"])!!}
                            @error('dataexam14')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center">S-2221</div>
                        <div class="col-md-3" style="text-align: center">Exame Toxicológico: Admissional / Demissional</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result14', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result14"])!!}
                            @error('result14')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>


                        <div class="col-md-3" style="text-align: center">
                            {!! Form::date('dataexam15', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam15"])!!}
                            @error('dataexam15')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>
                        <div class="col-md-3" style="text-align: center"></div>
                        <div class="col-md-3" style="text-align: center">Outros Exames Complementares</div>
                        <div class="col-md-3" style="text-align: center">
                            {!! Form::text('result15', null,
                            ['placeholder' => '...', 'class' => "form-control", "name" => "result15"])!!}
                            @error('result15')
                            <div class="text-danger">{{ "***$message" }}</div>@enderror
                        </div>

                        <div class="col-md-3" style="margin-top: 25px">
                            <div class="form-group">
                                <label>Selecione a data que foi realizado o ASO</label>
                                {!! Form::date('dataexam16', null,
                                    ['placeholder' => '...', 'class' => "form-control", "name" => "dataexam16"])!!}
                                @error('dataexam16')
                                <div class="text-danger">{{ "***$message" }}</div>@enderror
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
