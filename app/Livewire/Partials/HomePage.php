<?php

namespace App\Livewire\Partials;

use App\Models\Artistas;
use App\Models\Musicas;
use App\Models\Slides;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

#[Title('Página Principal')]

class HomePage extends Component
{

    public function download($file)
    {
        // Certifique-se de que $file seja o caminho completo e correto
        $filePath = 'musics/' . $file;

        // Verifica se o arquivo existe no disco público
        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->download($filePath);
        } else {
            session()->flash('error', 'Arquivo não encontrado.');
        }
    }

    public function render()
    {
        $topMusicas = Musicas::orderBy('search_count', 'desc')->limit(15)->get();
        $musicas = Musicas::where('status', 1)->orderBy('created_at', 'desc')->get();
        $artistas = Artistas::where('status', 1)->limit(50)->get();
        $musicasM = Musicas::where('mensal', 1)->first();
        $musicasD = Musicas::where('destaques', 1)
            ->limit(12)
            ->orderBy('created_at', 'desc')
            ->get();
        $slides = Slides::where('status', 1)->get();

        return view('livewire.partials.home-page', [
            'musicas' => $musicas,
            'artistas' => $artistas,
            'musicasM' => $musicasM,
            'musicasD' => $musicasD,
            'slides' => $slides,
            'topMusicas' => $topMusicas
        ]);
    }
}
