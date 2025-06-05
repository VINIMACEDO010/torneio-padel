<?php

namespace App\Http\Controllers;

use App\Models\Torneio;
use App\Models\Jogador;
use App\Models\Partida;
use Illuminate\Http\Request;

class TorneioController extends Controller
{
    public function index()
    {
        $torneios = Torneio::all();
        return view('torneios.index', compact('torneios'));
    }

    public function create()
    {
        return view('torneios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        Torneio::create($request->all());
        return redirect()->route('torneios.index')->with('success', 'Torneio criado com sucesso!');
    }

public function gerarPartidas($torneioId)
{
    $torneio = Torneio::findOrFail($torneioId);
    $jogadores = Jogador::all();

    // Geração de combinações únicas
    for ($i = 0; $i < count($jogadores); $i++) {
        for ($j = $i + 1; $j < count($jogadores); $j++) {
            Partida::create([
                'torneio_id' => $torneio->id,
                'jogador1_id' => $jogadores[$i]->id,
                'jogador2_id' => $jogadores[$j]->id,
                'resultado' => null
            ]);
        }
    }

    return redirect()->route('partidas.index')->with('success', 'Partidas geradas com sucesso!');
}
}
