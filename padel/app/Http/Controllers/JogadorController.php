<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::paginate(10);
        return view('jogadors.index', compact('jogadores'));
    }

    public function create()
    {
        return view('jogadors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|in:masculino,feminino,misto'
        ]);

        Jogador::create($request->all());

        return redirect()->route('jogadors.index')->with('success', 'Jogador cadastrado com sucesso!');
    }

    public function edit(Jogador $jogador)
    {
        return view('jogadors.edit', compact('jogador'));
    }

    public function update(Request $request, Jogador $jogador)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'genero' => 'required|in:masculino,feminino,misto'
        ]);

        $jogador->update($request->all());

        return redirect()->route('jogadors.index')->with('success', 'Jogador atualizado com sucesso!');
    }

    public function destroy(Jogador $jogador)
    {
        $jogador->delete();
        return redirect()->route('jogadors.index')->with('success', 'Jogador excluído com sucesso!');
    }
}
