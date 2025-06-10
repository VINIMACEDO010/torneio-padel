<?php

namespace App\Http\Controllers;

use App\Models\Torneio;
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
}
