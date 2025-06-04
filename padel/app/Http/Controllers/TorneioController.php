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

    public function gerarPartidas($id)
    {
        $torneio = Torneio::findOrFail($id);
        $jogadores = Jogador::all();

        foreach ($jogadores as $i => $j1) {
            for ($j = $i + 1; $j < count($jogadores); $j++) {
                $j2 = $jogadores[$j];
                Partida::create([
                    'torneio_id' => $torneio->id,
                    'jogador1_id' => $j1->id,
                    'jogador2_id' => $j2->id,
                    'sets_jogador1' => 0,
                    'sets_jogador2' => 0,
                ]);
            }
        }

        return redirect()->route('torneios.index')->with('success', 'Partidas geradas!');
    }

    public function destroy(Torneio $torneio)
    {
        $torneio->delete();
        return redirect()->route('torneios.index')->with('success', 'Torneio excluído!');
    }
}
