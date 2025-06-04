@extends('layouts.app')

@section('content')
    <h2>Editar Resultado da Partida</h2>
    <form action="{{ route('partidas.update', $partida->id) }}" method="POST">
        @csrf @method('PUT')
        <p>{{ $partida->jogador1->nome }} x {{ $partida->jogador2->nome }}</p>
        <label>Sets {{ $partida->jogador1->nome }}:</label>
        <input type="number" name="sets_jogador1" value="{{ $partida->sets_jogador1 }}" min="0">
        <label>Sets {{ $partida->jogador2->nome }}:</label>
        <input type="number" name="sets_jogador2" value="{{ $partida->sets_jogador2 }}" min="0">
        <button type="submit">Atualizar</button>
    </form>
@endsection
