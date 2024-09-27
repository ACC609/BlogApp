<?php

namespace App\Http\Controllers;

use App\Models\Musicas;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Obter o termo de pesquisa
        $query = $request->input('query');

        // Buscar músicas pelo título ou pelo nome do artista
        $musicas = Musicas::where('titulo', 'like', "%{$query}%")
            ->orWhere('artistas', 'like', "%{$query}%")
            ->get();

        foreach ($musicas as $musica) {
            $musica->increment('search_count');
        }

        // Retornar os resultados para a view de resultados de pesquisa
        return view('search-results', compact('musicas'));
    }
}
