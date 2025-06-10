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
        $partidas = Partida::with('torneio', 'jogador1', 'jogador2')->paginate(10);
        return view('partidas.index', compact('partidas'));
    }

    public function create()
    {
        $jogadores = Jogador::all();
        $torneios = Torneio::all();
        return view('partidas.create', compact('jogadores', 'torneios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'torneio_id' => 'required|exists:torneios,id',
            'jogador1_id' => 'required|exists:jogadors,id',
            'jogador2_id' => 'required|exists:jogadors,id',
            'data_partida' => 'required|date'
        ]);

        Partida::create([
            'torneio_id' => $request->torneio_id,
            'jogador1_id' => $request->jogador1_id,
            'jogador2_id' => $request->jogador2_id,
            'data_partida' => $request->data_partida,
            'resultado' => null
        ]);

        return redirect()->route('partidas.index')->with('success', 'Partida criada com sucesso!');
    }

    public function edit(Partida $partida)
    {
        return view('partidas.edit', compact('partida'));
    }

    public function update(Request $request, Partida $partida)
    {
        $request->validate([
            'resultado' => 'nullable|string'
        ]);

        $partida->update([
            'resultado' => $request->resultado
        ]);

        return redirect()->route('partidas.index')->with('success', 'Partida atualizada!');
    }

    public function destroy(Partida $partida)
    {
        $partida->delete();
        return redirect()->route('partidas.index')->with('success', 'Partida excluída!');
    }
}
