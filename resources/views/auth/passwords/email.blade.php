<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title ?? 'Resetar a Senha'}}</title>

        {{-- ARQUIVOS CSS GERAIS --}}
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/app.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/jqvmap/dist/jqvmap.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/weather-icon/css/weather-icons.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/weather-icon/css/weather-icons-wind.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/summernote/summernote-bs4.css')}}">

        {{-- TEMPLATE CSS --}}
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/bootstrap-social/bootstrap-social.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/components.min.css')}}">

        {{-- CSS CUSTOMIZADO--}}
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/custom.css')}}">

        {{-- FAVICON --}}
        <link rel='shortcut icon' type='image/x-icon' href="{{url('Painel/light/assets/img/favicon.png')}}" />

        {!! htmlScriptTagJsApi() !!}
    </head>
    <body>

        {{-- LOADING DA PÁGINA --}}
        <div class="loader"></div>

        {{-- INÍCIO DO CONTEÚDO DA PÁGINA --}}
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Redefinir a Senha</h4>
                            </div>
                            <div class="card-body">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form action="{{ route('password.email') }}" method="POST" class="needs-validation">
                                    @csrf
                                
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" name="email" placeholder="Digite o seu e-mail aqui..." class="form-control" tabindex="1" required autofocus>
                                
                                        @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <!-- Adicione aqui o campo de recaptcha ou qualquer outro campo necessário -->
                                        @error('g-recaptcha-response')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                    </div>
                                
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Enviar</button>
                                    </div>
                                </form>
                                


                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </section>
        {{-- FIM DO CONTEÚDO DA PÁGINA --}}


        {{-- JAVASCRIPTS --}}

        {{-- SCRIPTS JS GERAIS --}}
        <script src="{{url('Painel/light/assets/js/app.min.js')}}"></script>

        {{-- BIBLIOTECAS JS --}}
        <script src="{{url('Painel/light/assets/bundles/echart/echarts.js')}}"></script>
        <script src="{{url('Painel/light/assets/bundles/chartjs/chart.min.js')}}"></script>
        <script src="{{url('Painel/light/assets/bundles/sweetalert/sweetalert_2.min.js')}}"></script>
        <script src="{{url('Painel/light/assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>

        {{-- JS ESPECÍFICO PARA PÁGINA --}}


        {{-- JS PARA TEMPLATE --}}
        <script src="{{url('Painel/light/assets/js/scripts.js')}}"></script>

        {{-- JS CUSTOMIZADO --}}
        <script src="{{url('Painel/light/assets/js/custom.js')}}"></script>

    </body>
</html>


