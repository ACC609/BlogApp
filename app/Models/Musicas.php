<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musicas extends Model
{
    use HasFactory;

    protected $fillable = ['id_artista', 'id_categoria', 'imagem', 'slug', 'descricao', 'titulo', 'ano', 'genero', 'musica', 'status'];

    public function artista()
    {
        return $this->belongsTo(Artistas::class, 'id_artista');
    }

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
}
