<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>{{$title ?? 'Sistema'}}</title>

        {{-- ARQUIVOS CSS GERAIS --}}
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/app.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/jqvmap/dist/jqvmap.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/weather-icon/css/weather-icons.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/weather-icon/css/weather-icons-wind.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/bundles/summernote/summernote-bs4.css')}}">

        {{-- TEMPLATE CSS --}}
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/style.min.css')}}">
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/components.min.css')}}">

        {{-- CSS CUSTOMIZADO --}}
        <link rel="stylesheet" href="{{url('Painel/light/assets/css/custom.css')}}">

        {{-- CSS EXTRA --}}
        @stack('css-extra')

        {{-- FAVICON --}}
        <link rel='shortcut icon' type='image/x-icon' href="{{url('Painel/light/assets/img/favicon.png')}}" />
        <script src="https://cdn.tailwindcss.com"></script>
        @livewireStyles
    </head>
    <body>

        {{-- LOADING DA PÁGINA --}}
        <div class="loader"></div>

        {{-- INÍCIO DA SEÇÃO PRINCIPAL DA PÁGINA --}}
        <section id="app">
            <div class="main-wrapper main-wrapper-1">

                {{-- INCLUINDO DA NAVBAR --}}
                @include('Painel.includes.navbar')

                {{-- INCLUINDO MENU LATERAL DA PÁGINA --}}
                @include('Sistema.includes.menu')

                {{-- INÍCIO DO CONTEÚDO DA PÁGINA --}}
                <div class="main-content">
                    <section class="content">
                        @yield('content')
                    </section>
                </div>
                {{-- FIM DO CONTEÚDO DA PÁGINA --}}

                {{-- INÍCIO DO FOOTER --}}
                <footer class="main-footer">
                    <div class="footer-left">
                        Copyright &copy; 2023
                        <div class="bullet"></div>
                        Desenvolvido por <a href="#">S.TOLEDO</a>
                    </div>
                    <div class="footer-right">
                    </div>
                </footer>
                {{-- FIM DO FOOTER --}}
                
            </div>
        </section>
        {{-- FIM DA SEÇÃO PRINCIPAL DA PÁGINA --}}

        {{-- JAVASCRIPTS --}}
        {{-- SCRIPTS JS GERAIS --}}
        <script src="{{url('Painel/light/assets/js/app.min.js')}}"></script>

        {{-- BIBLIOTECAS JS --}}
        <script src="{{url('Painel/light/assets/bundles/echart/echarts.js')}}"></script>
        <script src="{{url('Painel/light/assets/bundles/chartjs/chart.min.js')}}"></script>
        <script src="{{url('Painel/light/assets/bundles/sweetalert/sweetalert_2.min.js')}}"></script>
        <script src="{{url('Painel/light/assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>

        {{-- JS PARA TEMPLATE --}}
        <script src="{{url('Painel/light/assets/js/scripts.js')}}"></script>

        {{-- JS CUSTOMIZADO --}}
        <script src="{{url('Painel/light/assets/js/custom.js')}}"></script>

        {{-- JS EXTRA --}}
        @stack('js-extra')

        @livewireScripts
    </body>
</html>
