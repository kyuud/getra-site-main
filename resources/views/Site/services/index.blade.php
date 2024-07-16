<section id="services" >
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Nossos Serviços</h2>
                <p class="text-center wow fadeInDown">
                    A Getra – Gestão em Segurança do Trabalho, atua na região de João Pessoa, Campina Grande e cidades circunvizinhas no estado da Paraíba, como suporte e apoio da gestão de recursos humanos para as empresas, no que diz respeito a aplicação das Normas Regulamentadoras do Ministério do Trabalho relativas a Saúde e Segurança do Trabalho (SST).
                </p>
            </div>
            <div class="row">
                @forelse ($services as $item)
                    
                
                    <div class="features">
                        <div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="300ms" data-wow-delay="0ms">
                            <div class="media service-box">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('uploads/services/'.$item->image)}}" alt="Imagem de capa do card">
                                    <div class="card-body">
                                        <h5 class="card-title"style="min-height: 50px">{{$item->title}}</h5>
                                        <p class="card-text" style="min-height: 100px">{{$item->description}} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @empty
        
                @endforelse
            </div>{{-- /.row  --}}
        </div>{{-- /.container --}}
</section>{{-- /#services --}}