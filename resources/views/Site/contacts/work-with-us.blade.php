@include('Site.includes.header')

{!! htmlScriptTagJsApi() !!}

<section id="contato" class="ftco-section">

    <div class="section-header">
        <h2 class="section-title text-center wow fadeInDown">trabalhe-conosco</h2>
        <p class="text-center wow fadeInDown">
            Preencha os dados e anexe seu currículo. Se torne nosso colaborador!
        </p>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-md-7 d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Envie seu curriculo</h3>

                                {!! Form::open(['route' => 'work-send', 'class' => 'form', "id"=>"main-contact-form", 'method' => 'POST' ,'files' => true]) !!}

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
                                {{-- FIM MENSAGENS DE SUCESSO --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::text('name', null, ['placeholder' => 'Digite o seu nome aqui...',
                                            'class' => "form-control", "id"=>"name"]) !!}
                                            @error('nome')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::email('email', null, ['placeholder' => 'Digite o seu e-mail aqui...',
                                            'class' => "form-control", "id"=>"email"]) !!}
                                            @error('email')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::number('phone', null, ['placeholder' => 'Digite o seu telefone aqui...',
                                            'class' => "form-control", "id"=>"phone"]) !!}
                                            @error('telefone')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::file('file', ['class' => 'form-control', 'id'=>'file']) !!}
                                            arquivos pdf, doc ou docx
                                            @error('file')<div class="texT-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! htmlFormSnippet() !!}
                                            @error('g-recaptcha-response')<div class="text-danger">{{ "***$message" }}</div>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            {!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}

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
</section>

@include('Site.includes.footer')
