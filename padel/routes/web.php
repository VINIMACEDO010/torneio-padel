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
    Route::resource('jogadors', JogadorController::class);
    Route::resource('torneios', TorneioController::class);
    Route::resource('partidas', PartidaController::class);

    Route::get('/torneios/{id}/gerar-partidas', [TorneioController::class, 'gerarPartidas'])->name('torneios.gerarPartidas');
    Route::get('/ranking', [RankingController::class, 'ranking'])->name('ranking.index');
});

require __DIR__.'/auth.php';
