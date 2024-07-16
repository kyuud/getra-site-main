<div class="divider-1"></div>

{!! htmlScriptTagJsApi() !!}

<section id="proposal">



    <div class="section-header">
        <h2 class="section-title text-center wow fadeInDown">Proposta</h2>
        <p class="text-center wow fadeInDown">
            Lore ipsum Lore ipsumLore ipsumLore ipsumLore ipsum!
        </p>
    </div>
    <div class="ftco-section">

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Deseja uma proposta?</h3>

                                {{-- MENSAGENS DE SUCESSO --}}
                                @if( Session::has('success') )
                                    <div class="alert  alert-success">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="ace-icon fa fa-times"></i>
                                        </button>
                                        <p>
                                            <strong>
                                                <i class="ace-icon fa fa-check">
                                                </i>Sucesso!
                                            </strong>Recebemos sua mensagem.
                                            {!! Session::get('success') !!}
                                        </p>

                                    </div>
                                @endif
                                {{-- FIM DA MENSAGENS DE SUCESSO --}}

                                <form action="{{ route('proposal-contact') }}" method="post" class="form" id="main-contact-form">
                                    @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="nome" placeholder="Digite o seu nome aqui..." class="form-control" id="name" value="{{ old('nome') }}">
                                            @error('nome')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Digite o seu e-mail aqui..." class="form-control" id="email" value="{{ old('email') }}">
                                            @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" name="telefone" placeholder="Digite o seu telefone aqui..." class="form-control" id="telefone" value="{{ old('telefone') }}">
                                            @error('telefone')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="funcionarios" placeholder="Digite quantos Funcionários..." class="form-control" id="funcionarios" value="{{ old('funcionarios') }}">
                                            @error('funcionarios')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="cnpj" placeholder="Digite seu CNPJ..." class="form-control" id="cnpj" value="{{ old('cnpj') }}">
                                            @error('cnpj')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="mensagem" placeholder="Digite sua mensagem..." class="form-control" id="mensagem">{{ old('mensagem') }}</textarea>
                                            @error('mensagem')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! htmlFormSnippet() !!}
                                            @error('g-recaptcha-response')<div class="text-danger">{{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="submit" value="Enviar" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-md-5 d-flex align-items-stretch">
                            <div class="info-wrap bg-primary w-100 p-lg-5 p-4">
                                <h3 class="mb-4 mt-md-4">Nos Contate</h3>

                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>

                                    <div class="text pl-3">
                                        <p>{{$companies[0]->street}},<br> {{$companies[0]->number}} {{$companies[0]->neighborhood}} - {{$companies[0]->cep}}<br>
                                            {{$companies[0]->city}} - {{$companies[0]->state}}</p>
                                    </div>
                                </div>

                                <div class="dbox w-100 d-flex align-items-start">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-map-marker"></span>
                                    </div>

                                    <div class="text pl-3">
                                        <p>{{$companies[1]->street}},<br> {{$companies[1]->number}} {{$companies[1]->neighborhood}} - {{$companies[1]->cep}}<br>
                                            {{$companies[1]->city}} - {{$companies[1]->state}}</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-phone"></span>
                                    </div>
                                    <div class="text pl-3">
                                        {{$companies[0]->phone}}<br>
                                        {{$companies[0]->mobile}}</p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-envelope-o"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p><a target="_blank" href="mailto:desenvolvimento@stoledo.com.br"> {{$companies[0]->email}} </a></p>
                                    </div>
                                </div>
                                <div class="dbox w-100 d-flex align-items-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-user"></span>
                                    </div>
                                    <div class="text pl-3">
                                        <p> <a target="_blank" href="{{$companies[0]->facebook}}"><i class="fa fa-facebook"></i></a>  &nbsp; &nbsp;
                                            <a target="_blank" href="{{$companies[0]->instagram}}"><i class="fa fa-instagram"></i></a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
