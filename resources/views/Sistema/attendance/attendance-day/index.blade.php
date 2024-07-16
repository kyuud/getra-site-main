@extends('Sistema.templates.template_01')

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
    <section class="section">
        {{-- CONTEÚDO TOTAL DA PÁGINA --}}
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Registro dos dias de atendimento</h4>
                    </div>
                    <div class="row col-12 col-md-12 col-lg-12">

                        <div class="col-md-6 col-lg-6">
                            {{-- BOTÃO PARA CADASTRAR UM NOVO REGISTRO --}}
                            <a href="{{route('attendance.create')}}" class="btn btn-icon icon-left btn-success">
                                <i class="fas fa-plus-square"></i> Novo registro</a>

                            {{-- BOTÃO PARA GERAR RELATÓRIO
                            <a href="" target="_blank" class="btn btn-icon icon-left btn-outline-danger">
                                <i class="fas fa-file-pdf"></i> Gerar PDF</a>--}}

                            {{-- BOTÃO PARA VOLTAR UMA PÁGINA --}}
                            <a class="btn btn-primary" onclick="history.go(-1);" style="cursor:pointer; color: #fff">Voltar</a>

                        </div>

                        <div class="col-md-6 col-lg-6">
                            {{-- FORMULÁRIO PARA PESQUISAR REGISTRO --}}
                            {!! Form::open(['route' => 'doctors.search', 'class' => 'form form-search form-ds']) !!}

                            <div class="input-group">

                                {!! Form::text('key-search', null, ['placeholder' => 'Pesquisar na tabela:', 'class' => 'form-control offset-8 col-lg-4', 'required']) !!}

                                <div class="input-group-btn">
                                    {{ Form::button('<i class="fas fa-search"></i>',
                                    ['type' => 'submit', 'class' => 'btn btn-primary', 'style'=>'min-height: 41px'])}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>

                    </div>

                    <br style="clear: both"/>


                    <div class="row col-12 col-md-12 col-lg-12">
                        @forelse($data as $day)

                            <div class="col-lg-2 col-md-3 col-sm-12">
                                <div class="card l-bg-green-light">
                                    <a style="text-decoration: none;" href="{{route('attendee', [$year, $month, $day->day, 1])}}">
                                        <div class="card-statistic-3">
                                            <div class="card-icon card-icon-large"><i class="fa fa-clock"></i></div>
                                            <div class="card-content">
                                                <h4 class="card-title">{{$day->day}}/{{$day->month}}/{{$year}}</h4>

                                                <p class="mb-0 text-sm">
                                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $attendanceCount }}</span>
                                                    <span class="text-nowrap">Registros</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @empty

                        @endforelse
                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection

{{-- PARA INCLUIR CSS E JS ESPECÍFICOS DA PÁGINA --}}

{{--
--  @push('css-extra')
--      <link rel="stylesheet" href="{{url('Painel/light/assets/css/custom.css')}}">
--  @endpush
--
--  @push('js-extra')
--      <script src="{{url('Painel/light/assets/js/custom.js')}}"></script>
--  @endpush
--}}
