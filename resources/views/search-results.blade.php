@extends('home-page')

@section('seacrh')
<div class="container">
    @if($musicas->isEmpty())
        <p>Nenhum resultado encontrado para "{{ request('query') }}"</p>
    @else
        <div class="row">
            @foreach($musicas as $musica)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3" style="margin-top: 40px;margin-bottom: 30px">
                <div class="single-album-area wow fadeInUp h-100" style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; border-radius: 5px; overflow: hidden; background-color: #fff;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="album-thumb">
                        <img style="width: 100%; height: 14rem; object-fit: cover; border-top-left-radius: 5px; border-top-right-radius: 5px;" src="{{ url('storage', $musica->imagem) }}" alt="Imagem do álbum">
                    </div>
                    <div class="album-info" style="text-align: center; padding: 1rem;">
                        <a href="{{ route('musicas-detalhes', ['slug' => $musica->slug]) }}">
                            <h5 style="font-size: 1.1rem; font-weight: bold; margin-bottom: 0.5rem;">{{ $musica->artistas }}</h5>
                        </a>
                        <p style="font-size: 0.9rem; color: #666; margin-bottom: 0.5rem;">{{ $musica->titulo }}</p>
                        <a href="{{ Storage::url('musics/' . basename($musica->musica)) }}" class="btn btn-primary" download style="font-size: 0.85rem; padding: 0.4rem 0.8rem;">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach($musicas as $musica)
            @if($musica->destaques == 1)
                <div class="col-12">
                    <div class="single-song-area mb-30 d-flex flex-wrap align-items-end">
                        <div class="song-thumbnail">
                            <img src="{{ url('storage', $musica->imagem) }}" alt="Imagem da música">
                        </div>
                        <div class="song-play-area">
                            <div class="song-name">
                                <p>{{ $musica->artistas }} - ({{ $musica->titulo }})</p>
                            </div>
                            <audio preload="auto" controls>
                                <source src="{{ asset('storage/' . $musica->musica) }}">
                            </audio>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    @endif
</div>

@endsection
