@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalhes da Partida</h1>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Torneio:</strong> {{ $partida->torneio->nome }}</li>
        <li class="list-group-item"><strong>Jogador 1:</strong> {{ $partida->jogador1->nome }}</li>
        <li class="list-group-item"><strong>Jogador 2:</strong> {{ $partida->jogador2->nome }}</li>
        <li class="list-group-item"><strong>Resultado:</strong> {{ $partida->resultado ?? '-' }}</li>
        <li class="list-group-item"><strong>Data:</strong> {{ \Carbon\Carbon::parse($partida->data_partida)->format('d/m/Y H:i') }}</li>
    </ul>

    <a href="{{ route('partidas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
