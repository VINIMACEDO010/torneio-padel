@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Partida</h1>
    <form action="{{ route('partidas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jogador1_id">Jogador 1</label>
            <select name="jogador1_id" class="form-control" required>
                @foreach ($jogadors as $jogador)
                    <option value="{{ $jogador->id }}">{{ $jogador->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="jogador2_id">Jogador 2</label>
            <select name="jogador2_id" class="form-control" required>
                @foreach ($jogadors as $jogador)
                    <option value="{{ $jogador->id }}">{{ $jogador->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="sets_jogador1">Sets Jogador 1</label>
            <input type="number" name="sets_jogador1" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="sets_jogador2">Sets Jogador 2</label>
            <input type="number" name="sets_jogador2" class="form-control" required>
        </div>

        <div class="form-group mt-2">
            <label for="torneio_id">Torneio</label>
            <select name="torneio_id" class="form-control" required>
                @foreach ($torneios as $torneio)
                    <option value="{{ $torneio->id }}">{{ $torneio->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Salvar</button>
    </form>
</div>
@endsection
