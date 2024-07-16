{{-- HEADER --}}
@include('Site.includes.headerblog')

<title>Blog Post - Start Bootstrap Template</title>

<body>

<!-- Page Content -->
<div class="container">

<div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

            <!-- Title -->
            <h2 class="entry-title" style="min-height: 50px"><a href="#">{{$blog['title']}}</a></h2>

            <!-- Author -->
            <p class="lead">{{$blog['abstract']}} </p>

            <hr>

            <!-- social-01 -->
            <div class="social-01 social-01__style-02">
                <nav class="social-01__navSocial">
                    <a class="social-01__item" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}.com&display=popup" target="_blank"><img src="{{url('Site/images/facebook.png')}}" alt=""></i></a>
                    <a class="social-01__item" href="https://api.whatsapp.com/send?text={{Request::url()}}" target="_blank"><img src="{{url('Site/images/whatsapp.png')}}" alt=""></a>
                    <a class="social-01__item" href="https://www.linkedin.com/shareArticle?mini=true&url={{Request::url()}}" target="_blank"> <img src="{{url('Site/images/linkedin.png')}}" alt=""> </a>
                </nav>
            </div><!-- End / social-01 -->

            <!-- Date/Time -->
            <div class="entry-date">{{ str_replace('-', '/', date('d-m-Y', strtotime($blog['created_at'])))}}</div>

            <hr>

            <!-- Preview Image -->
            <img src="{{asset('uploads/blogs/'.$blog['image'])}}" alt="">

            <hr>

            <p style="text-align: left">
                {!!$blog['description']!!}
            </p>

    </div>

    <!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Recentes</h5>
            <div class="card-body">
            <div class="row">
                @forelse ($bloglimit as $key=>$item)
                    <div class="col-lg-6">
                        <ul class="list-unstyled mb-0">
                            <li>
                            <a href="{{route('blogpost', [$item->id, slugify($item->title)])}}"> 
                                <img src="{{asset('uploads/blogs/'.$item->image)}}" alt="" style="width: 50%">
                                <p style="width: 50%"></p> {{$item->title}}
                            </a>
                            </li>
                        </ul>
                    </div>
                @empty
                @endforelse 
            </div>
            </div>
        </div>

    </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->


</body>

</html>

{{-- HEADER --}}
@include('Site.includes.footerblog')