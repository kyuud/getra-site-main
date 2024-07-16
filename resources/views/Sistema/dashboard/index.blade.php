@extends('Sistema.templates.template_01')

@section('content')

    <section class="section">

        <div class="row">

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-green-light">
                    <a style="text-decoration: none;" href="{{route('system-companies.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Clientes</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $companies }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-green-light">
                    <a style="text-decoration: none;" href="{{route('employees.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Funcionários</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $employees }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-green-light">
                    <a style="text-decoration: none;" href="{{route('doctors.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Médicos</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $doctors }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-orange">
                    <a style="text-decoration: none;" href="{{route('financial.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Financeiro</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $financials }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-orange">
                    <a style="text-decoration: none;" href="{{route('training.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Treinamentos</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $trainings }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-orange">
                    <a style="text-decoration: none;" href="{{route('appraisal.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Laudos</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $appraisals }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-blue-light">
                    <a style="text-decoration: none;" href="{{route('aso.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">ASOS</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $asos }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-blue-light">
                    <a style="text-decoration: none;" href="{{route('anamnese.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Anamneses</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $anamneses }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-blue-light">
                    <a style="text-decoration: none;" href="{{route('screening.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Triagens</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $screenings }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 col-sm-12">
                <div class="card l-bg-yellow">
                    <a style="text-decoration: none;" href="{{route('users.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Usuários</h4>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $users }}</span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-2">
                <div class="card l-bg-yellow">
                    <a style="text-decoration: none;" href="{{route('logs.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-user-shield"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Logs</h4>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $logsCount }}</span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Acessos Recentes</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped">
                                <tr>
                                    <th style="width:25%;">Nome do Usuário</th>
                                    <th style="width:15%;">IP de Acesso</th>
                                    <th style="width:35%;">E-mail</th>
                                    <th style="width:15%;">Data & Hora</th>
                                </tr>

                                {{-- LISTANDO REGISTROS DINAMICAMENTE --}}
                                @forelse($logs as $log)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img alt="image" class="mr-3 rounded-circle" width="40"
                                                    src='{{url("uploads/users/".$log->user->image)}}'>
                                                <div class="media-body">
                                                    <div class="media-title">{{$log->user->name}}</div>
                                                    <div class="text-job text-muted">{{$log->roleUser->roleDash->label}}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$log->ip}}</td>
                                        <td>
                                            {{$log->user->email}}
                                        </td>
                                        <td>{{ formatDate($log['created_at']) }}</td>
                                    </tr>

                                @empty
                                    <tr>
                                        <p>Nenhum Log Cadastrado</p>
                                    </tr>
                                @endforelse
                            </table>
                        </div>
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
