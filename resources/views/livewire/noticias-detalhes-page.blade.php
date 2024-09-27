<div>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Veja o que há de novo</p>
            <h2>Ler Notícias</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Blog Area Start ##### -->
    <div class="blog-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img style="width: 1200px; height: 635px" src="{{ url('storage', $noticia->banner) }}" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span>{{ $noticia->created_at->format('d') }}</span>
                                <span>{{ $noticia->created_at->format('m') }} ‘{{ $noticia->created_at->format('y') }}</span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">{{ $noticia->titulo }}</a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">Por: <a href="#">Adolfo Cabeia</a></p>
                            </div>
                            <!-- Post Excerpt -->
                            <p>{{ $noticia->descricao }}</p>
                            <p style="text-align: justify">{{ $noticia->texto }}</p>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-3">
                    <div class="blog-sidebar-area">

                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Categories</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    @foreach ($categorias as $categoria)
                                    <li><a href="#">{{ $categoria->nome }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- Widget Area -->
                        <div class="single-widget-area mb-30">
                            <div class="widget-title">
                                <h5>Tags</h5>
                            </div>
                            <div class="widget-content">
                                <ul class="tags">
                                    @foreach ($musica as $musica)
                                    <li><a href="#">{{ $musica->genero }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Area End ##### -->
</div>
