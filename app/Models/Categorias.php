<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{

    use HasFactory;

    protected $fillable = ['nome', 'status'];

    public function musicas()
    {
        return $this->hasMany(Musicas::class, 'id_categoria');
    }
}
