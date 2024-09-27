<?php

namespace App\Livewire;

use App\Models\Noticias;
use Livewire\Component;
use App\Models\Categorias;
use App\Models\Musicas;

class NoticiasDetalhesPage extends Component
{
    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
        $noticias = Noticias::where('slug', $this->slug)->firstOrFail();
    }
    public function render()
    {
        $categorias = Categorias::where('status', 1)->get();
        $musica = Musicas::where('status', 1)->get();
        return view('livewire.noticias-detalhes-page', [
            'noticia' => $noticias = Noticias::where('slug', $this->slug)->firstOrFail(),
            'categorias' => $categorias,
            'musica' => $musica,
        ]);
    }
}
