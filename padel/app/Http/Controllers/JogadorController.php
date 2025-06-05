<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    public function index()
    {
        $jogadores = Jogador::paginate(10); // exemplo
        return view('jogadors.index', compact('jogadores'));
    }

    public function create()
    {
        return view('jogadors.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        Jogador::create($request->all());
        return redirect()->route('jogadors.index')->with('success', 'Jogador cadastrado com sucesso!');
    }

    public function show(Jogador $jogador)
    {
        return view('jogadors.show', compact('jogador'));
    }

    public function edit(Jogador $jogador)
    {
        return view('jogadors.edit', compact('jogador'));
    }

    public function update(Request $request, Jogador $jogador)
    {
        $request->validate(['nome' => 'required|string|max:255']);
        $jogador->update($request->all());
        return redirect()->route('jogadors.index')->with('success', 'Jogador atualizado!');
    }

    public function destroy(Jogador $jogador)
    {
        $jogador->delete();
        return redirect()->route('jogadors.index')->with('success', 'Jogador excluído!');
    }
}
