<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Partida;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function ranking()
    {
        $jogadores = Jogador::all();
        $ranking = [];

        foreach ($jogadores as $jogador) {
            $vitorias = Partida::where(function($query) use ($jogador) {
                $query->where('jogador1_id', $jogador->id)
                      ->where('resultado', 'jogador1');
            })->orWhere(function($query) use ($jogador) {
                $query->where('jogador2_id', $jogador->id)
                      ->where('resultado', 'jogador2');
            })->count();

            $ranking[] = [
                'jogador' => $jogador->nome,
                'vitorias' => $vitorias
            ];
        }

        // Ordenar por vitórias desc
        usort($ranking, fn($a, $b) => $b['vitorias'] <=> $a['vitorias']);

        return view('ranking.index', compact('ranking'));
    }
}

