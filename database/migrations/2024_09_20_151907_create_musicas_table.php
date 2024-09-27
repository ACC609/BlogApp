<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('musicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_categoria')->constrained('categorias')->cascadeOnDelete()->nullable();
            $table->string('artistas')->nullable();
            $table->string('imagem');
            $table->string('slug');
            $table->string('descricao');
            $table->string('titulo');
            $table->string('ano');
            $table->string('genero');
            $table->string('musica');
            $table->boolean('status')->default(true);
            $table->boolean('destaques')->default(true);
            $table->boolean('mensal')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('musicas');
    }
};
