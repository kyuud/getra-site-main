@include('Site.includes.header')

<section id="unity" class="ftco-section">
    <div class="container">

        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Nossas Unidades</h2>
            <p class="text-center wow fadeInDown">
                Confira nossas Unidades!
            </p>
        </div>
        <div class="cards_units">
            @forelse($units as $item)

                <article class="card_unitys">
                    <img
                            class="card__background"
                            src="{{asset('uploads/units/'.$item->image)}}"
                            alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
                    />
                    <div class="card__content | flow">
                        <div class="card__content--container | flow">
                            <h2 class="card__title" style="color: white">{{$item->title}}</h2>
                            <p class="card__description" style="color: white">
                                {{$item->description}}
                            </p>
                        </div>
                        <a href="{{$item->link}}" target="_blank"><button class="card__button">Localização</button></a>
                    </div>
                </article>

            @empty
            @endforelse
        </div>
    </div>
</section>

@include('Site.includes.footer')
