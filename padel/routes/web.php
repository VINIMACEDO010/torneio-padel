<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogadorController;
use App\Http\Controllers\TorneioController;
use App\Http\Controllers\PartidaController;
use App\Http\Controllers\RankingController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Recursos
    Route::resource('jogadors', JogadorController::class);
    Route::resource('torneios', TorneioController::class);
    Route::resource('partidas', PartidaController::class);

    // Geração automática de partidas para um torneio específico
    Route::get('/torneios/{torneio}/gerar-partidas', [TorneioController::class, 'gerarPartidas'])->name('torneios.gerarPartidas');

    // Exibição do ranking por sets
    Route::get('/ranking/sets', [RankingController::class, 'rankingSets'])->name('ranking.sets');

    Route::get('/torneios/{id}/gerar-partidas', [TorneioController::class, 'gerarPartidas'])->name('torneios.gerarPartidas');

    Route::get('/ranking', [RankingController::class, 'ranking'])->name('ranking.index');

});

require __DIR__.'/auth.php';
