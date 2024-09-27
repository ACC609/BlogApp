<div>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>Veja o que há de novo</p>
            <h2>Música - detalhes</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <div class="oneMusic-buy-now-area mb-100">
        <div class="container" style="padding: 90px">
            <div class="row justify-content-center align-items-center">
                <!-- Single Album Area -->
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                    <div class="single-album-area text-center">
                        <div class="album-thumb mb-4">
                            <!-- Ajustando o tamanho da imagem para ser responsiva -->
                            <img style="width: 100%; height: auto; max-height: 600px; object-fit: cover;" src="{{ url('storage', $musica->imagem) }}" alt="">
                        </div>
                        <div class="album-info">
                            <h5>{{ $musica->artistas }}</h5>
                            <p>Título: <b>{{ $musica->titulo }}</b></p>
                            <p>Ano: <b>{{ $musica->ano }}</b></p>
                            <p>Gênero: <b>{{ $musica->genero }}</b></p>
                            <p class="text-muted">{{ $musica->descricao }}</p>
                            <div class="load-more-btn mt-3">
                                <a href="{{ Storage::url('musics/'.basename($musica->musica)) }}" class="btn btn-primary" download>
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


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

                @foreach ($musicas as $musicaD)
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
</div>
