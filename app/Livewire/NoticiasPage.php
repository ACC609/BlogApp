<?php

namespace App\Livewire;

use App\Models\Categorias;
use App\Models\Musicas;
use App\Models\Noticias;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Página de notícias')]
class NoticiasPage extends Component
{
    public function render()
    {
        $categorias = Categorias::where('status', 1)->get();
        $musica = Musicas::where('status', 1)->get();
        $noticias = Noticias::where('status', 1)->get();
        return view('livewire.noticias-page', [
            'categorias' => $categorias,
            'musica' => $musica,
            'noticias' => $noticias,
        ]);
    }
}
