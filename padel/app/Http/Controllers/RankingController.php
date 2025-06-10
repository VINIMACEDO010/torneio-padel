<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use App\Models\Partida;

class RankingController extends Controller
{
    public function ranking()
    {
        $jogadores = Jogador::all();
        $ranking = [];

        foreach ($jogadores as $jogador) {
            $sets_vencidos = 0;

            // Buscar partidas como jogador1
            $partidas1 = Partida::where('jogador1_id', $jogador->id)->get();
            foreach ($partidas1 as $p) {
                if (!empty($p->resultado)) {
                    $placares = explode(' ', $p->resultado);
                    foreach ($placares as $placar) {
                        $set = explode('x', $placar);
                        if (count($set) === 2) {
                            [$j1, $j2] = $set;
                            if ((int)$j1 > (int)$j2) {
                                $sets_vencidos++;
                            }
                        }
                    }
                }
            }

            // Buscar partidas como jogador2
            $partidas2 = Partida::where('jogador2_id', $jogador->id)->get();
            foreach ($partidas2 as $p) {
                if (!empty($p->resultado)) {
                    $placares = explode(' ', $p->resultado);
                    foreach ($placares as $placar) {
                        $set = explode('x', $placar);
                        if (count($set) === 2) {
                            [$j1, $j2] = $set;
                            if ((int)$j2 > (int)$j1) {
                                $sets_vencidos++;
                            }
                        }
                    }
                }
            }

            $ranking[] = [
                'jogador' => $jogador->nome,
                'sets_vencidos' => $sets_vencidos
            ];
        }

        usort($ranking, fn($a, $b) => $b['sets_vencidos'] <=> $a['sets_vencidos']);

        return view('ranking.index', compact('ranking'));
    }
}
