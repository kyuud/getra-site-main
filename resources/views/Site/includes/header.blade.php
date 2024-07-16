<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A Getra – Gestão em Segurança do Trabalho,
	atua na região de João Pessoa, Campina Grande e cidades circunvizinhas no estado da Paraíba,
	como suporte e apoio da gestão de recursos humanos para as empresas, no que diz respeito a aplicação das Normas
	Regulamentadoras do Ministério do Trabalho relativas a Saúde e Segurança do Trabalho (SST).">
    <meta name="author" content="">
    <title>Getra - Gestão em Segurança do Trabalho LTDA</title>

    {{-- FAVICON --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{url('Site/images/favicon.png')}}">

    {{-- SPLIDE STYLES --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide-core.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/themes/splide-sea-green.min.css"/>

    <link rel="stylesheet" href="{{url('Site/icons/font/flaticon.css')}}"/>

    <link rel="stylesheet" href="{{url('Site/css/main.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Site/css/style.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Site/css/animate.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Site/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Site/css/font-awesome.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Site/css/login.min.css')}}"/>
    <link rel="stylesheet" href="{{url('Site/css/main.less')}}"/>

    <link rel="stylesheet" href="{{url('Site/css/owl.transitions.css')}}"/>

    {{-- Google Fonts --}}
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'/>

</head> {{-- head --}}

<body id="home" class="homepage">

<header id="header">
    <nav id="main-menu" class="navbar navbar-default navbar-fixed-top top-nav-collapse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/').'#header'}}"><img style="max-width: 250px; margin-top: -15px"
                                                                           src="{{url('Site/images/logonova-getra.png')}}"
                                                                           alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav menu">
                    <li class="scroll active"><a href="{{url('/').'#main-slider'}}">Home</a></li>
                    <li class="scroll"><a href="{{url('/').'#services'}}">Serviços </a></li>
                    <li class="scroll"><a href="{{url('/').'#portfolio'}}">Portfolio</a></li>
                    <li><a href="{{ route('blogs-site') }}">Notícias </a></li>
                    <li><a href="{{ route('unit') }}">Unidades</a></li>
                    <li><a href="{{ route('contact') }}">Contato</a></li>
                    <li id="work-button" class="scroll"><a href="{{ url('/').'#proposal' }}">Propostas</a></li>
                    <li id="work-button"><a href="{{ route('trabalhe') }}">Trabalhe Conosco</a></li>
                </ul>
            </div>
        </div>
        {{-- /.container --}}
    </nav>
    {{-- /nav --}}
</header>
{{-- /header --}}

