<div class="divider-1"></div>

<section id="blog">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title text-center wow fadeInDown">Notícias</h2>
            <p class="text-center wow fadeInDown">Notícias sobre Engenharia e Saúde da Seguança do Trabalho</p>
        </div>
        <div class="row">
            <div id="owl-example" class="owl-carousel">

                @forelse ($blogs as $key=>$item)
                    <div class="text-center item">
                        <div class="blog-post blog-large wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="0ms">
                            <article>
                                <header class="entry-header">
                                    <div class="entry-thumbnail">
                                        <img src="{{asset('uploads/blogs/'.$item->image)}}" alt="">
                                    </div>
                                    <div class="entry-date">{{ str_replace('-', '/', date('d-m-Y', strtotime($item->created_at)))}}</div>
                                    <h2 class="entry-title" style="min-height: 50px"><a href="#">{{$item->title}}</a></h2>
                                </header>
                                <div class="entry-content">
                                    <p style="min-height: 100px">{{$item->abstract}}</p>
                                    <a href="{{ route('blogpost', [$item->id, slugify($item->title)]) }}">
                                        <button type="button" class="btn btn-primary">
                                            LER MAIS
                                        </button>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </div>
</section>
