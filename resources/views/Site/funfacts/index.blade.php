<section id="animated-number">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title text-center wow fadeInDown">Fatos Interessantes</h2>
                <p class="text-center wow fadeInDown">Resultados exigem esforço, paciência e constância. O caminho do novo é cheio de riscos, surpresas e cansaço, mas sempre premiam os que escolhem experimentar.</p>
            </div>
            <div class="row text-center">
                @forelse ($funfacts as $item)
                    
                
                    <div class="col-sm-3 col-xs-6">
                        <div class="wow fadeInUp" data-wow-duration="400ms" data-wow-delay="0ms">
                            <div class="animated-number" data-digit="<?= $item->value ?>" data-duration="1000"></div>
                            <strong><?= $item->title ?></strong>
                        </div>
                    </div>

                @empty
                    
                @endforelse
            </div>
        </div>
    </section>
{{-- /#animated-number --}}