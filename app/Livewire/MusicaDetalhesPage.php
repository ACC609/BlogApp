<?php

namespace App\Livewire;

use App\Models\Musicas;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class MusicaDetalhesPage extends Component
{
    public $slug;
    public function download($file)
    {
        $filepath = 'musics/' . $file;

        if (Storage::disk('public')->exists($filepath)) {
            return Storage::disk('public')->download($filepath);
        } else {
            session()->flash('error', 'Arquivo Não encontrado');
        }
    }
    public function mount($slug)
    {
        $this->slug = $slug;
        $musica = Musicas::where('slug', $this->slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.musica-detalhes-page', [
            'musica' => Musicas::where('slug', $this->slug)->firstOrFail(),
            'musicas' => Musicas::where('destaques', 1)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
