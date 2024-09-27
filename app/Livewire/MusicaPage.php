<?php

namespace App\Livewire;

use App\Models\Musicas;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

#[Title('Página de Músicas')]
class MusicaPage extends Component
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

        $musica = Musicas::where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        $musicaD = Musicas::where('destaques', 1)
            ->orderBy('created_at', 'desc')
            ->limit(50)
            ->get();
        return view('livewire.musica-page', [
            'musicas' => $musica,
            'musicaD' => $musicaD,
        ]);
    }
}
