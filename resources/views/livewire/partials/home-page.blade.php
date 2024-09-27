<div>
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            @foreach ($slides as $slide)
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url({{url('storage', $slide->imagem)}});"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">{{ $slide->titulo }}</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">{{ $slide->descricao }} <span>{{ $slide->descricao }}</span></h2>
                                <a data-animation="fadeInUp" data-delay="500ms" href="{{ $slide->link }}" class="btn oneMusic-btn mt-50">Download <i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Veja o que há de novo</p>
                        <h2>Últimos Álbuns</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <div class="ablums-text text-center mb-70">
                        <p><p>Os últimos lançamentos de álbuns trazem uma mistura incrível de sons e estilos, refletindo a diversidade musical de artistas de todo o mundo. Cada álbum apresenta uma nova perspectiva, desde as batidas vibrantes dos ritmos afro até as melodias suaves do jazz contemporâneo. Com letras que tocam o coração e produções inovadoras, esses álbuns estão redefinindo as fronteiras da música. Descubra o que há de novo e deixe-se envolver pelas criações mais recentes do cenário musical global.</p>
                        .</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        @foreach ($musicasD as $musica)
                        <!-- Single Album -->
                        <div class="single-album">
                            <img style="width: 500px; height: 300px" src="{{url('storage', $musica->imagem)}}" alt="">
                            <div class="album-info">
                                <a href="#">
                                    <h5>{{ $musica->titulo }}</h5>
                                </a>
                                <p>{{ $musica->artistas }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Veja o que há de novo</p>
                        <h2>Faça o Download da sua música preferida</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach ($musicasD as $musicasD)
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb" >
                            <img style="width: 300px; height: 200px" src="{{url('storage', $musicasD->imagem)}}" alt="">
                            <!-- Play Icon -->
                           {{--  <div class="icon-download">
                                <a href="#" class="video--play--btn"><span class="icon-download-button"></span></a>
                            </div> --}}
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>{{ $musicasD->artistas }}</h5>
                            </a>
                            <p>{{ $musicasD->titulo }}</p>
                            <a href="{{ Storage::url('musics/' . basename($musicasD->musica)) }}" class="btn btn-primary" download>
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

    <!-- ##### Featured Artist Area Start ##### -->
    <section class="featured-artist-area section-padding-100 bg-img bg-overlay bg-fixed" style="background-image: url({{asset('img/bg-img/bg-4.jpg')}});">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="featured-artist-thumb">
                        <img style="width: 618px; height: 318px" src="{{url('storage', $musicasM->imagem)}}" alt="">
                    </div>
                </div>
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="featured-artist-content">
                        <!-- Section Heading -->
                        <div class="section-heading white text-left mb-30">
                            <p>Veja o que há de novo</p>
                            <h2>Músicas Destaques</h2>
                        </div>
                        <p>As músicas em destaque representam o melhor que o cenário musical tem a oferecer no momento. De hits dançantes que dominam as paradas a baladas emocionantes que tocam a alma, cada faixa foi cuidadosamente selecionada por seu impacto e qualidade. Esses destaques trazem produções excepcionais, letras poderosas e interpretações que capturam a essência da música contemporânea. Explore essas canções imperdíveis e descubra os sons que estão fazendo história.</p>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>{{ $musicasM->artistas}} - ({{ $musicasM->titulo}})</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('storage/' . $musicasM->musica) }}">
                            </audio>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Featured Artist Area End ##### -->

    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>Veja o que há de novo</p>
                            <h2>Mais Procuradas</h2>
                        </div>
                        @foreach ($topMusicas as $topMusica)
                        @if ($topMusica->search_count != 0)
                        <!-- Single Top Item -->
                        <div class="single-top-item d-flex wow fadeInUp" data-wow-delay="150ms">
                            <div class="thumbnail">
                                <img src="{{url('storage', $topMusica->imagem)}}" alt="">
                            </div>
                            <div class="content-">
                                <h6>{{ $topMusica->titulo }}</h6>
                                <p>{{ $topMusica->artistas }}</p>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>Veja o que há de novo</p>
                            <h2>Novas Músicas</h2>
                        </div>
                        @foreach ($musicas as $musica)
                        <!-- Single Top Item -->
                        <div class="single-new-item d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="100ms">
                            <div class="first-part d-flex align-items-center">
                                <div class="thumbnail">
                                    <img src="{{url('storage', $musica->imagem)}}" alt="">
                                </div>
                                <div class="content-">
                                    <h6>{{ $musica->titulo }}</h6>
                                    <p>{{ $musica->artistas }}</p>
                                </div>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('storage/' . $musica->musica) }}" type="audio/mpeg">
                            </audio>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <p>Veja o que há de novo</p>
                            <h2>Artistas Populares</h2>
                        </div>
                        @foreach ($artistas as $artista)
                        <!-- Single Artist -->
                        <div class="single-artists d-flex align-items-center wow fadeInUp" data-wow-delay="100ms">
                            <div class="thumbnail">
                                <img src="{{url('storage', $artista->imagem)}}" alt="">
                            </div>
                            <div class="content-">
                                <p>{{ $artista->nome }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->

</div>
