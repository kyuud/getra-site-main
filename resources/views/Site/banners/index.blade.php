<section id="main-slider">
    <div class="owl-carousel">        
            @forelse ($banners as $item)
                <img style="width: 100%" class="img-responsive" src="{{asset('uploads/banners/'.$item->image)}}">
            @empty
            @endforelse
    </div>
</section>
{{-- /#main-slider --}}

