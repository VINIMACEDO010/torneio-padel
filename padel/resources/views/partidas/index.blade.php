@extends('layouts.app')

@section('content')
    <h2>Partidas</h2>
    <ul>
        @foreach($partidas as $partida)
            <li>
                {{ $partida->torneio->nome }}:
                {{ $partida->jogador1->nome }} ({{ $partida->sets_jogador1 }}) x
                ({{ $partida->sets_jogador2 }}) {{ $partida->jogador2->nome }}
                <a href="{{ route('partidas.edit', $partida->id) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
