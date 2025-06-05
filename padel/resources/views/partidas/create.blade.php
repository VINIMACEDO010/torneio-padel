@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Nova Partida</h1>

    <form action="{{ route('partidas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="torneio_id" class="form-label">Torneio</label>
            <select name="torneio_id" class="form-select" required>
                <option value="">Selecione um torneio</option>
                @foreach ($torneios as $torneio)
                    <option value="{{ $torneio->id }}">{{ $torneio->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jogador1_id" class="form-label">Jogador 1</label>
            <select name="jogador1_id" class="form-select" required>
                <option value="">Selecione o jogador 1</option>
                @foreach ($jogadores as $jogador)
                    <option value="{{ $jogador->id }}">{{ $jogador->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jogador2_id" class="form-label">Jogador 2</label>
            <select name="jogador2_id" class="form-select" required>
                <option value="">Selecione o jogador 2</option>
                @foreach ($jogadores as $jogador)
                    <option value="{{ $jogador->id }}">{{ $jogador->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="data_partida" class="form-label">Data e Hora da Partida</label>
            <input type="datetime-local" name="data_partida" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('partidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
