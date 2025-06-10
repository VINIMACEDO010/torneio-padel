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
            'nome' => 'required|string|max:255',
            'categoria' => 'required|in:masculino,feminino,misto',
            'max_participantes' => 'required|integer|min:2'
        ]);

        Torneio::create($request->all());

        return redirect()->route('torneios.index')->with('success', 'Torneio criado com sucesso!');
    }

    public function destroy(Torneio $torneio)
    {
        $torneio->delete();
        return redirect()->route('torneios.index')->with('success', 'Torneio excluído!');
    }

    public function gerarPartidas($id)
    {
        $torneio = Torneio::findOrFail($id);
        $jogadores = Jogador::all();

        for ($i = 0; $i < count($jogadores); $i++) {
            for ($j = $i + 1; $j < count($jogadores); $j++) {
                Partida::create([
                    'torneio_id' => $torneio->id,
                    'jogador1_id' => $jogadores[$i]->id,
                    'jogador2_id' => $jogadores[$j]->id,
                    'resultado' => null,
                    'data_partida' => now()
                ]);
            }
        }

        return redirect()->route('partidas.index')->with('success', 'Partidas geradas com sucesso!');
    }
}
