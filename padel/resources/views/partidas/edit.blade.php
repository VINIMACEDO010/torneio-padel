@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Partida</h1>

    <form action="{{ route('partidas.update', $partida->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Resultado</label>
            <input type="text" name="resultado" class="form-control" value="{{ $partida->resultado }}" placeholder="Ex: 6x3, 7x6">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('partidas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
