<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>{{$title ?? 'Relatório'}}</title>


        {{-- CSS EXTRA--}}
        @stack('css-extra')

        {{-- FAVICON --}}
        <link rel='shortcut icon' type='image/x-icon' href="{{url('Site\multikart\assets\images\favicon\1.png')}}" />

    </head>



    <body style="background-color: white!important;">
{{-- 
                <div>
                    <div style="text-align: center">
                    <img style="max-width: 250px; margin-top: -15px;" src="{{url('Site/images/logonova-getra.png')}}" alt="logo">
                    </div>
                    <h6 style="text-align: center">
                        Rua José Elpídio da Costa Monteiro, 92, São José - Campina Grande - PB <br>
                        Contatos: (83) 3201-1446 / (83) 99988-1495  <br>
                        E-mail: getra@getra.com.br
                    </h6>
                </div> --}}

                    @yield('content')



            {{-- INÍCIO DO FOOTER --}}
            <footer style="top: 10px" class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2020
                    <div class="bullet"></div>
                    Desenvolvido por <a href="#">S.TOLEDO</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
            {{-- FIM DO FOOTER --}}

        {{-- JS EXTRA--}}
        @stack('js-extra')

    </body>
</html>
