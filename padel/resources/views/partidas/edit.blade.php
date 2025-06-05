@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Partida</h1>
    <form action="{{ route('partidas.update', $partida) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="sets_jogador1">Sets Jogador 1</label>
            <input type="number" name="sets_jogador1" class="form-control" value="{{ $partida->sets_jogador1 }}" required>
        </div>

        <div class="form-group mt-2">
            <label for="sets_jogador2">Sets Jogador 2</label>
            <input type="number" name="sets_jogador2" class="form-control" value="{{ $partida->sets_jogador2 }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
    </form>
</div>
@endsection
