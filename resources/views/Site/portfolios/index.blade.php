<section id="portfolio">

    <div class="section-header">
        <h2 class="section-title text-center wow fadeInDown">PORTFOLIO</h2>
        <p class="text-center wow fadeInDown">
            A GETRA possui sede na cidade de Campina Grande e uma unidade itinerante equipada com para atender a toda
            Paraíba, trazendo a melhor qualidade no atendimento para todos os clientes.
        </p>
    </div>

    <div class="splide" role="group" aria-label="Splide Basic HTML Example">
        <div class="splide__track">
            <ul class="splide__list">
                @forelse ($portfolios as $item)
                    <li class="splide__slide"><img class="img-responsive"
                                                   src="{{asset('uploads/portfolios/'.$item->image)}}" alt=""/></li>
                @empty

                @endforelse
            </ul>
        </div>
    </div>


    {{-- /.container --}}
</section>
{{-- /#portfolio --}}
