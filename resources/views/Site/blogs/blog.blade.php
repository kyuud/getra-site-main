{{-- HEADER --}}
@include('Site.includes.header')

  <title>Título da Página</title>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-12">

        <h2 class="section-title text-center wow fadeInDown">Notícias</h2>
        <p class="text-center wow fadeInDown">
          Notícias sobre Engenharia e Saúde da Seguança do Trabalho
        </p>
        <br>
        <br>

        <!-- Blog Post -->
        <div class="card mb-6">
          @forelse ($blogs as $key=>$item)
          <img src="{{asset('uploads/blogs/'.$item->image)}}" alt="">
            <div class="card-body">
              <p class="entry-date">
                {{ str_replace('-', '/', date('d-m-Y', strtotime($item->created_at)))}}
              </p>
              <h4 class="card-title"><a href="#">{{$item->title}}</a></h4>
              <a href="{{route('blogpost', [$item->id, slugify($item->title)])}}"> 
              <button type="button" class="btn btn-primary" 
                      data-toggle="modal" data-target="#ModalLongoExemplo{{$key}}">
                      LER MAIS
              </button>
              </a>
              <br>
              <br>
              <br>
              {{-- <P style="min-height: 100px">{{$item->abstract}}</P> --}}
            </div>
            
          @empty
          @endforelse 
        </div>

        <!-- Pagination -->
        {!! $blogs->links() !!}

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Categories Widget -->
        {{-- <div class="card my-4">
          <h4 class="card-header">Recentes</h4>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div> --}}

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


{{-- HEADER --}}
@include('Site.includes.footer')