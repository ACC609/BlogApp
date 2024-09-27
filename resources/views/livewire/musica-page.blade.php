<div>
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Vejas as Novidades</p>
            <h2>Página de Músicas</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="album-catagory section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                        <div class="search-bar mb-70">
                            <form action="{{ route('search') }}" method="GET" class="d-flex">
                                <input type="text" name="query" placeholder="Pesquisar artistas ou títulos..." class="form-control me-2">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                        </div>
                </div>
            </div>
            <div class="row">

                @foreach ($musicas as $musica)
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb" >
                            <img style="width: 26.2rem; height: 14rem" src="{{url('storage', $musica->imagem)}}" alt="">
                            <!-- Play Icon -->
                           {{--  <div class="icon-download">
                                <a href="#" class="video--play--btn"><span class="icon-download-button"></span></a>
                            </div> --}}
                        </div>
                        <div class="album-info">
                            <a href="{{ route('musicas-detalhes',['slug'=>$musica->slug]) }}">
                                <h5>{{ $musica->artistas }}</h5>
                            </a>
                            <p>{{ $musica->titulo }}</p>
                            <a href="{{ Storage::url('musics/' . basename($musica->musica)) }}" class="btn btn-primary" download>
                                <i class="fas fa-download"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ##### Album Catagory Area End ##### -->


    <!-- ##### Song Area Start ##### -->
    <div class="one-music-songs-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Destaques</p>
                        <h2>Sinta o prazer de ouvir a sua música preferida</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($musicaD as $musicaD)
                <!-- Single Song Area -->
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="{{ url('storage', $musicaD->imagem) }}" alt="">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>{{ $musicaD->artistas }} - ({{ $musicaD->titulo }})</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('storage/' . $musicaD->musica) }}">
                            </audio>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- ##### Song Area End ##### -->
</div>
