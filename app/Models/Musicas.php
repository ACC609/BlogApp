<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musicas extends Model
{
    use HasFactory;

    protected $fillable = ['id_categoria', 'artistas', 'imagem', 'slug', 'descricao', 'titulo', 'ano', 'genero', 'musica', 'status', 'destaques', 'mensal'];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'id_categoria');
    }
}
