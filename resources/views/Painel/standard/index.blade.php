@extends('Painel.templates.template_01')


@section('content')

    <section class="section">

        <div class="row ">
            <div class="col-2">
                <a style="text-decoration: none;" href="{{route('banners.index')}}">
                    <div class="card l-bg-green">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-book"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Banners</h4>
                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $banners }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2">
                <a style="text-decoration: none;" href="{{route('services.index')}}">
                    <div class="card l-bg-green">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Serviços</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $services }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2">
                <div class="card l-bg-green">
                    <a style="text-decoration: none;" href="{{route('funfacts.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-list"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Fatos</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $funfacts }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="card l-bg-green">
                    <a style="text-decoration: none;" href="{{route('portfolios.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-palette"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Portfólio</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $portfolios }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="card l-bg-green">
                    <a style="text-decoration: none;" href="{{route('teams.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-users"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Equipe</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $teams }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="card l-bg-green">
                    <a style="text-decoration: none;" href="{{route('blogs.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-book-open"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Blog</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $blogs }} </span>
                                    <span class="text-nowrap">Registros</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-2">
                <div class="card l-bg-green">
                    <a style="text-decoration: none;" href="{{route('companies.index')}}">
                        <div class="card-statistic-3">
                            <div class="card-icon card-icon-large"><i class="fa fa-suitcase"></i></div>
                            <div class="card-content">
                                <h4 class="card-title">Empresa</h4>

                                <p class="mb-0 text-sm">
                                    <span class="mr-2"><i class="fas fa-check-circle"></i> {{ $companies }} </span>
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
                                        <td>{{ date('d-m-Y H:i:s', strtotime($log['created_at'])) }}</td>
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
