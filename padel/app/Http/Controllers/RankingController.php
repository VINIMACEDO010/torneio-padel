<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogador;
use App\Models\Partida;

class RankingController extends Controller
{
    /**
     * Exibe o ranking dos jogadores por sets vencidos.
     */
    public function rankingSets()
    {
        $jogadores = Jogador::all();

        $ranking = $jogadores->map(function ($jogador) {
            $setsVencidos = Partida::where(function ($query) use ($jogador) {
                $query->where('jogador1_id', $jogador->id)
                      ->whereColumn('sets_jogador1', '>', 'sets_jogador2');
            })->orWhere(function ($query) use ($jogador) {
                $query->where('jogador2_id', $jogador->id)
                      ->whereColumn('sets_jogador2', '>', 'sets_jogador1');
            })->count();

            return [
                'jogador' => $jogador,
                'sets_vencidos' => $setsVencidos
            ];
        })->sortByDesc('sets_vencidos');

        return view('ranking.sets', compact('ranking'));
    }
}
