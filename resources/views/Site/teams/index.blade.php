<section id="meet-team">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">NOSSSA EQUIPE</h2>
                <p class="text-center wow fadeInDown">
                    O quadro de profissionais de Getra é composta por: Médicos, Engenheiros e 
                    Técnicos em Enfermagem e Segurança do Trabalho que são intensivamente treinados e 
                    capacitados para atender e elaborar os programas exigidos pelos órgãos legais.
                </p>
            </div>
            <div class="row">
                @forelse ($teams as $item)
                            <div class="col-sm-6 col-md-3" style="margin-top: 20px">
                                <div class="team-member wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                                    <div class="team-img">
                                        <img src="{{asset('uploads/teams/'.$item->image)}}" alt="">
                                    </div>
                                    <div class="team-info">
                                        <h4 style="max"> {{$item->title}} </h4>
                                        {{-- <span>//$item->description ?></span> --}}
                                    </div>
                                </div>
                            </div>
                @empty

                @endforelse
            </div>
        </div>
    </section>{{-- /#meet-team --}}