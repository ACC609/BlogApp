<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albuns extends Model
{
    use HasFactory;
    protected $fillable = ['id_artistas', 'titulo', 'slug', 'imagem', 'ano', 'arquivo', 'status'];

    public function artista()
    {
        return $this->belongsTo(Artistas::class, 'id_artistas');
    }
}
