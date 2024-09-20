<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artistas extends Model
{
    use HasFactory;
    protected $fillable = ['imagem', 'nome', 'status'];

    public function musicas()
    {
        return $this->hasMany(Musicas::class);
    }

    public function albuns()
    {
        return $this->hasMany(Albuns::class, 'id_artistas');
    }
}
