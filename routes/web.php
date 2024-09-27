<?php

use App\Livewire\ContactosPage;
use App\Livewire\MusicaDetalhesPage;
use App\Livewire\MusicaPage;
use App\Livewire\NoticiasDetalhesPage;
use App\Livewire\NoticiasPage;
use App\Livewire\Partials\HomePage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\SearchController;

Route::get('/', HomePage::class, 'render');
Route::get('musica', MusicaPage::class, 'render')->name('musica');
Route::get('noticias', NoticiasPage::class, 'render')->name('noticias');
Route::get('contactos', ContactosPage::class, 'render')->name('contactos');
Route::get('Noticias-detalhes/{slug}', NoticiasDetalhesPage::class, 'render')->name('detalhes');
Route::get('musica-detalhe/{slug}', MusicaDetalhesPage::class, 'render')->name('musicas-detalhes');
Route::get('/search', [SearchController::class, 'search'])->name('search');
