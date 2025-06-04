<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function rankingSets()
    {
        $ranking = DB::table('jogadors')
            ->leftJoin('partidas as p1', 'jogadors.id', '=', 'p1.jogador1_id')
            ->leftJoin('partidas as p2', 'jogadors.id', '=', 'p2.jogador2_id')
            ->select('jogadors.nome',
                DB::raw('COALESCE(SUM(p1.sets_jogador1),0) + COALESCE(SUM(p2.sets_jogador2),0) as total_sets'))
            ->groupBy('jogadors.nome')
            ->orderByDesc('total_sets')
            ->get();

        return view('ranking.sets', compact('ranking'));
    }
}
