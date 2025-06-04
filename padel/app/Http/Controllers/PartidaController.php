<?php

namespace App\Http\Controllers;

use App\Models\Partida;
use App\Models\Jogador;
use App\Models\Torneio;
use Illuminate\Http\Request;

class PartidaController extends Controller
{
    public function index()
    {
        $partidas = Partida::with('torneio', 'jogador1', 'jogador2')->get();
        return view('partidas.index', compact('partidas'));
    }

    public function edit(Partida $partida)
    {
        return view('partidas.edit', compact('partida'));
    }

    public function update(Request $request, Partida $partida)
    {
        $request->validate([
            'sets_jogador1' => 'required|integer|min:0',
            'sets_jogador2' => 'required|integer|min:0',
        ]);

        $partida->update($request->all());
        return redirect()->route('partidas.index')->with('success', 'Partida atualizada!');
    }
}
